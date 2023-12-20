<?php
namespace App\Http\Traits;
use App\Models\Bank;
use App\Models\Car;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Validation\Rule;


trait Calculations{

    /*
        -- some Notes
            - administrative_fees => الرسوم الادارية
            - first batch  الدفعة الأولى
            - last batch الدفعة الأخيرة
            - insurance_percentage => التامين
            - installment => مدة التقسيط بالسنوات
            - benefir =>   الفائدة
            -  advance المقدم
            - firstBatchIncludeAdministrativeFees =>  الدفعة الأولى تشمل الرسوم الإدارية
    */

    public function checkBankOffer($bankId,$sectorId,$brandId){
        $today = Carbon::now()->format('Y-m-d');
        return collect(DB::select("SELECT 
            banks.id as bank_id,
            bank_offers.id as bank_offer_id,
            banks.name_".getLocale()." as bank_name,
            bank_offers.from as period_from,
            bank_offers.to as period_to,
            bank_offer_brand.brand_id as brand_id,
            bank_offer_sector.*

        from banks 
            RIGHT JOIN 
                bank_offers on banks.id = bank_offers.bank_id
            JOIN 
                bank_offer_brand on bank_offer_brand.bank_offer_id = bank_offers.id
            JOIN 
                bank_offer_sector on bank_offer_sector.bank_offer_id = bank_offers.id
            
            WHERE 
                bank_offers.to > '".$today."'
            AND
                bank_offers.from <= '".$today."'
            AND 
                bank_offer_brand.brand_id = ".$brandId."
            AND 
                banks.id = ".$bankId."
            AND
                bank_offer_sector.sector_id = ".$sectorId."

        "))->first();
    }

    public function calculateInstallments($request)
    {
        
        $car = Car::find($request->car_id);
        $bank = Bank::find($request->bank_id);
        $brandId = $car->brand_id;
        
        $sectorBenefit = null;
        $sectorSupport = null;
        $sectorAdvance = null;
        $sectorAdministrative_fees = null;
        $sectorInstallment = null;
        $bankOffer = $this->checkBankOffer($request->bank_id,$request->sector_id,$brandId);
        if($bankOffer !=null){
            $sectorBenefit = $bankOffer->benefit;
            $sectorSupport = $bankOffer->support;
            $sectorAdvance = $bankOffer->advance;
            $sectorAdministrative_fees = $bankOffer->administrative_fees;
            $sectorInstallment = $bankOffer->installment;
        }else{
            $sector = $bank->sectors()->find($request->sector_id)->pivot;
            $sectorBenefit = $sector['benefit'];
            $sectorSupport = $sector['support'];
            $sectorAdvance = $sector['advance'];
            $sectorAdministrative_fees = $sector['administrative_fees'];
            $sectorInstallment = $sector['installment'];
        }
        
        
        $price =  $car->getPriceAfterVatAttribute();
        // dd($car);

        $supportPercentage = $sectorSupport / 100;
        if($sectorSupport > 100){
            $price = ($price * $supportPercentage);
        }

        $last_installment = $price * ($request->last_installment/100);
        $first_installment = $price * ($request->first_installment/100);


        $benefitPercentage = $sectorBenefit / 100;
        $insurancePrice = $price * $request->installment * (settings()->get('insurance_percentage') / 100);
        $firstBatchIncludeAdministrativeFees = $first_installment + ( $price * ( $sectorAdministrative_fees / 100) );
        $fundingAmount = $price - $firstBatchIncludeAdministrativeFees + ( $price * ( $sectorAdministrative_fees / 100) );

        if ($benefitPercentage == 0)
            $fundingAmountIncludeBenefit =  $fundingAmount - $last_installment + $insurancePrice;
        else
            $fundingAmountIncludeBenefit = ($fundingAmount * $benefitPercentage * $request->installment) + $fundingAmount - $last_installment + $insurancePrice;

        $monthlyInstallment = $fundingAmountIncludeBenefit / $request->installment / 12;
        


        $otherBannks = $this->calculateInstallmentsAllBanks($request)->first();
        $class='w-100';
        $param='';
        return [
            'lwest_monthly_installment' => $otherBannks['monthlyInstallment'] <$monthlyInstallment ? $otherBannks:null,
            'monthly_installment' => $monthlyInstallment,
            'years' => $request->installment,
            'car' => view('components/web/car-component',compact('car','class','param'))->render(),
            'bank' =>  $bank
        ];

    }

    public function calculateByAmount($request)
    {
        $insurance = 0.03;
        
        $request->validate([
            'bank' => ['bail', 'required', 'exists:banks,id'],
            'sector' => ['bail', 'required', Rule::exists('bank_sector','sector_id')->where('bank_id',$request->bank)],
            'installment_amount' => ['bail', 'required', 'integer', 'min:1' ],
            'last_batch' => ['bail', 'required'],
            'years' => ['bail', 'required', 'integer', 'min:1'],
            'first_batch' => ['bail', 'required']
        ]);
        $bank = Bank::findOrFail($request->bank);
        $bankSectorPivotData = $bank->sectors->where('id', $request['sector'])->first()->pivot;
        $benefit = $bankSectorPivotData->benefit / 100;
        $support = $bankSectorPivotData->support > 0 ? ($bankSectorPivotData->support - 100) / 100 : 0;

        $request->validate([
            // 'years' => ['lte:' . $bankSectorPivotData->installment],
            // 'first_batch' => [ 'gte:' . $bankSectorPivotData->advance],
        ]);

        $maxCarPrice = ( ( $request['installment_amount'] * $request['years'] * 12 ) + $request['first_batch'] + $request['last_batch'] + ( $request['first_batch'] * $request['years'] * $benefit ) ) 
        /
        ( ( 1 + ($insurance * $request['years']) ) + ( $benefit * $request['years'] ) + $support);
        $maxCarPrice = ceil($maxCarPrice);

        $applicableCars = Car::select( Car::$carCardColumns )->where('price', '<=', $maxCarPrice)->orderByDesc('price')->get();
        $applicableCars = $applicableCars->filter(function($car) use($maxCarPrice,$applicableCars){
            return $car->price_after_vat <= $maxCarPrice;
        });

        return [
            "maxCarPrice" => $maxCarPrice,
            "applicableCars" => $applicableCars->values()
        ];
    }

    public function calculateInstallmentsAllBanks($request){
        $car = Car::find($request->car_id);
        $brandId = $car->brand_id;
        $banks = Bank::whereNotIn('id',[$request->bank_id])->where('accept_from_other_banks',1)->get();

        $monthlyInstallments = [];
        foreach($banks as $bank){
            $sectorBenefit = null;
            $sectorSupport = null;
            $sectorAdvance = null;
            $sectorAdministrative_fees = null;
            $sectorInstallment = null;
            $bankOffer = $this->checkBankOffer($bank->id,$request->sector_id,$brandId);
            
            if($bankOffer !=null){
                $sectorBenefit = $bankOffer->benefit;
                $sectorSupport = $bankOffer->support;
                $sectorAdvance = $bankOffer->advance;
                $sectorAdministrative_fees = $bankOffer->administrative_fees;
                $sectorInstallment = $bankOffer->installment;
            }else{
                $sector = $bank->sectors()->find($request->sector_id)->pivot;
                $sectorBenefit = $sector['benefit'];
                $sectorSupport = $sector['support'];
                $sectorAdvance = $sector['advance'];
                $sectorAdministrative_fees = $sector['administrative_fees'];
                $sectorInstallment = $sector['installment'];
            }

            $supportPercentage = $sectorSupport / 100;
            $price =  $car->getPriceAfterVatAttribute();
            if($sectorSupport > 100){
                $price = ($price * $supportPercentage);
            }
            $last_installment = $price * ($request->last_installment/100);
            $first_installment = $price * ($request->first_installment/100);
            $benefitPercentage = $sectorBenefit / 100;
            $insurancePrice = $price * $request->installment * (settings()->get('insurance_percentage') / 100);
            $firstBatchIncludeAdministrativeFees = $first_installment + ( $price * ( $sectorAdministrative_fees / 100) );
            $fundingAmount = $price - $firstBatchIncludeAdministrativeFees + ( $price * ( $sectorAdministrative_fees / 100) );

            if ($benefitPercentage == 0)
                $fundingAmountIncludeBenefit =  $fundingAmount - $last_installment + $insurancePrice;
            else
                $fundingAmountIncludeBenefit = ($fundingAmount * $benefitPercentage * $request->installment) + $fundingAmount - $last_installment + $insurancePrice;

            $monthlyInstallment = $fundingAmountIncludeBenefit / $request->installment / 12;
            $monthlyInstallments[]=[
                'bank_id' => $bank->id,
                'bank' => $bank->name,
                'monthlyInstallment' => $monthlyInstallment,
                
            ];
        }


        $monthlyInstallments = collect($monthlyInstallments)->sortBy('monthlyInstallment');

        return $monthlyInstallments;
    }

}

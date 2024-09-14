<?php

namespace App\Http\Controllers\API;

use App\Models\Car;
use App\Models\Bank;
use App\Models\City;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Service;
use App\Traits\NotificationTrait;
use App\Http\Resources\CarResource;
use App\Models\FundingOrganization;
use App\Http\Controllers\Controller;
use App\Http\Resources\BankResource;
use App\Http\Resources\CityResource;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\ServiceResource;
use App\Http\Requests\storeUnavailableCarRequest;
use App\Http\Requests\StoreCorporatesOrderRequest;
use App\Http\Requests\StoreIndividualOrderRequest;
use App\Http\Resources\FundingOrganizationResource;

class OrderController extends Controller
{
    use NotificationTrait;

    public function storeIndividualOrder(StoreIndividualOrderRequest $request)
    {
        $data = $request->validated();
        $data['type'] = 'individual';
        $car = Car::find($data['car_id']);
        $data['price'] = $car->selling_price_after_vat;

        if($request->funding_organization_type == 'same_bank')
            $data['funding_bank_id'] = $data['bank_id'];

        if ($request->file('id_and_driving_license'))
            $data['id_and_driving_license'] = uploadImage( $request->file('id_and_driving_license') , "Orders");

        if ($request->file('salary_identification'))
            $data['salary_identification'] = uploadImage( $request->file('salary_identification') , "Orders");

        if ($request->file('insurance_print'))
            $data['insurance_print'] = uploadImage( $request->file('insurance_print') , "Orders");

        if ($request->file('account_statement'))
            $data['account_statement'] = uploadImage( $request->file('account_statement') , "Orders");

        $order = Order::create($data);
        $order->services()->attach($request['services'] ?? []);

        /* $this->sendMail($order); */
        return response()->json(["individual order created successfully"]);
    }

    public function storeCorporatesOrder(StoreCorporatesOrderRequest $request)
    {
        $data = $request->validated();
        $data['type'] = 'organization';

        if ($request->file('bank_number_image'))
            $data['bank_number_image'] = uploadImage( $request->file('bank_number_image') , "Orders");

        if ($request->file('id_and_driving_license'))
            $data['id_and_driving_license'] = uploadImage( $request->file('id_and_driving_license') , "Orders");

        if ($request->file('salary_identification'))
            $data['salary_identification'] = uploadImage( $request->file('salary_identification') , "Orders");

        if ($request->file('insurance_print'))
            $data['insurance_print'] = uploadImage( $request->file('insurance_print') , "Orders");

        if ($request->file('account_statement'))
            $data['account_statement'] = uploadImage( $request->file('account_statement') , "Orders");

        $order = Order::create($data);
        $order->services()->attach($request['services'] ?? []);

        /* $this->sendMail($order); */
        return response()->json(["corporate order created successfully"]);
    }

    public function purchaseInfo()
    {
        return response([
            'cars' => CarResource::collection(Car::get()),
            'banks' => BankResource::collection(Bank::get()),
            'cities' => CityResource::collection(City::get()),
            'services' => ServiceResource::collection(Service::whereActive(true)->get()),
            'funding_organizations' => FundingOrganizationResource::collection(FundingOrganization::get()),
        ]);
    }

    public function unavailableCar(storeUnavailableCarRequest $request){

        $data = $request->validated();
        $data['type'] = 'unavailable_car';
        $data['phone'] = convertArabicNumbers($data['phone']);
        $order = Order::create($data);

        $this->newUnavailableCarNotification($order);
        return response()->json(["order created successfully"]);
    }

    public function filterData()
    {
        $maxPrice = Car::max('price');
        $minPrice = Car::min('price');

        $filterData = Brand::has('cars')->with(['parentModels'])->get()->map(function($brand){
            return [
                "id" => $brand->id,
                "image" => $brand->image_path,
                "name" => $brand->name,
                "parent_models" => $brand->parentModels->map(function($parentModel){
                    return [
                        'id' => $parentModel->id,
                        'name' => $parentModel->name,
                    ];
                })
            ];
        });

        return response()->json([
            'maxPrice' => $maxPrice,
            'minPrice' => $minPrice,
            'brands' => $filterData,
        ]);
    }

    public function sendMail($order)
    {
        try {
            Mail::send('mails.mail',[ 'order' =>  $order ],function($message){
                $message->to("info@alkathirimotors.com")
                    ->subject(__('New Car Order'));
            });

        } catch (\Throwable $th) {
            dd($th->getMessage()) ;
        }
    }
}

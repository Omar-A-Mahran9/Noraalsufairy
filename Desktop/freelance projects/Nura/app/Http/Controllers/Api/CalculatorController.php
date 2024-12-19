<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use App\Models\Bank;
use App\Models\Brand;
use App\Models\Sector;
use App\Models\CarModel;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Traits\Calculations;
use App\Http\Controllers\Controller;

class CalculatorController extends Controller
{
    use Calculations;

    public function index()
    {
        $banks = Bank::get();
        $sectors = Sector::get();
        $brands = Brand::select('id','image','name_en','name_ar', 'car_available_types' )->whereNotNull('car_available_types')->get();
        $models = CarModel::get();
        $categories = Category::get();
        $cars = Car::get();
        return view('web.calculator',compact('banks', 'sectors','brands', 'models', 'categories', 'cars'));
    }

    public function calculateInstallmentss(Request $request){
        $request->validate([
            "car_id" => "required",
            "bank_id" => "required",
            "brand_id" => "required",
            "model_id" => "required",
            "sector_id" => "required",
            "salary" => "required",
            "commitments" => "required",
            "first_installment" => "required",
            "last_installment" => "required",
            "installment" => "required",
            "gender" => ['bail', "required", 'in:male,female'],
            'transferred' => ['bail', 'required', 'in:0,1']
        ]);
        
        $calculateInstallments = $this->calculateInstallments($request);
        
        return $calculateInstallments;
        
    }
}

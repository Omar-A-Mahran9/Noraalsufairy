<?php

namespace App\Http\Controllers\API;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\SingleCarResource;
use App\Models\CarModel;

class CarController extends Controller
{
    public function all(Request $request)
    {
        $cars = Car::query();
        $cars->when(request()->name, fn($query) => $query->where('name_ar', 'like', "%" . request()->name . "%")->orWhere('name_en', 'like', "%" . request()->name . "%"));
        $cars->when($request->brands, fn($car) => $car->whereIn('brand_id', $request->brands));
        $cars->when($request->models, fn($car) => $car->whereIn('model_id', $request->models));
        $cars->when($request->type, fn($car) => $car->where('car_style', $request->type));

        $cars->when(request()->min_price && request()->max_price, function( $car ) {
            return $car->where(function($query) {
                $query->whereBetween('price' , [ request()->min_price, request()->max_price])->OrWhereBetween('discount_price' , [request()->min_price, request()->max_price]);
            });
        });

        return CarResource::collection($cars->get());
    }

    public function carsBasedOnModel(Request $request)
    {
        $cars = Car::query();

        // Conditional Filtering
        $cars->when($request->filled('brands'), function ($car) use ($request) {
            return $car->whereIn('brand_id', $request->brands);
        });

        $cars->when($request->filled('type'), function ($car) use ($request) {
            return $car->where('car_style', $request->type);
        });

        // Retrieve Cars with Model Relationship
        $carsWithModels = $cars->with('model')->get();

        // Transform the result
        $transformedCars = $carsWithModels->map(function ($car) {
            return [
                'year' => $car->year,
                'model_name' => optional($car->model)->name,
                'model_image' => optional($car->model)->first_image,
                'model_id' => optional($car->model)->id,
            ];
        });

        // Remove Duplicates based on Year and Model ID
        $uniqueCars = $transformedCars->unique(function ($car) {
            return $car['year'] . $car['model_id'];
        });

        return $uniqueCars->values()->all();
    }

    public function latest()
    {
        $cars = CarResource::collection(Car::orderBy('created_at', 'desc')->take(10)->get());

        return $cars;
    }

    public function modelCars(CarModel $carModel, Request $request)
    {

        $modelCars = $carModel->cars()->when($request->year, fn($car) => $car->where('year', $request->year))->get();
        return [
            'name' => $carModel->name,
            'images' => $carModel->images->pluck('image')->map(fn($image) => asset(getImagePathFromDirectory($image, 'CarModelImages'))),
            'cars' => SingleCarResource::collection($modelCars)
        ];
    }
}

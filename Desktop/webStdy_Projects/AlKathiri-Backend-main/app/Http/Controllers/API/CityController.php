<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;

class CityController extends Controller
{
    public function all()
    {
        $cities = City::select('id', 'name_ar', 'name_en')->get();

        return CityResource::collection($cities);
    }
}

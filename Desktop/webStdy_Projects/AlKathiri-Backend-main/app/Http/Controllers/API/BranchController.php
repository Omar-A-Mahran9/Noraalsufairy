<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityWithBranchResource;
use App\Models\Branch;
use App\Models\City;

class BranchController extends Controller
{
    public function all()
    {
        $citiesWithBranches = City::whereHas('branches', function($query){
            return $query->whereStatus('visible');
        })->get();

        return CityWithBranchResource::collection($citiesWithBranches);
    }
}

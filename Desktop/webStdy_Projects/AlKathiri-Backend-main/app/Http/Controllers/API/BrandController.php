<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function allBrands(Request $request)
    {
        $brands = BrandResource::collection(Brand::whereHas('cars')->get());

        return $brands;
    }
}

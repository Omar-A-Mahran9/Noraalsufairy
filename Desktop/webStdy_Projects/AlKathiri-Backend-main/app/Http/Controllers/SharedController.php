<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Http\Request;

class SharedController extends Controller
{
    /** shared means that functions that exist in dashboard and web **/


    public function getParentModels($brand_name)
    {
        $brand = Brand::where('name_ar', 'LIKE', '%' . $brand_name .'%')->orWhere('name_en', 'LIKE', '%' . $brand_name .'%')->first();

        $parentModels = $brand->parentModels()->select('id','name_'.getLocale())->get();

        return response()->json([
            'models' => $parentModels
        ]);
    }


    /** shared means that functions that exist in dashboard and web **/

}

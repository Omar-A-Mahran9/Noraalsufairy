<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarModel::create([
            "name_ar" => "S500",
            "name_en" => "S500",
            "meta_keyword_ar" => "S500",
            "meta_keyword_en" => "S500",
            "meta_desc_ar" => "S500",
            "meta_desc_en" => "S500",
            "parent_model_id" => null,
            "brand_id" => 1,
        ]);
        
        // CarModel::create([
        //     "name_ar" => "4matic",
        //     "name_en" => "4matic",
        //     "meta_keyword_ar" => "4matic",
        //     "meta_keyword_en" => "4matic",
        //     "meta_desc_ar" => "4matic",
        //     "meta_desc_en" => "4matic",
        //     "parent_model_id" => 1,
        //     "brand_id" => 1,
        // ]);
        
        CarModel::create([
            "name_ar" => "x3",
            "name_en" => "x3",
            "meta_keyword_ar" => "x3",
            "meta_keyword_en" => "x3",
            "meta_desc_ar" => "x3",
            "meta_desc_en" => "x3",
            "parent_model_id" => null,
            "brand_id" => 2,
        ]);
        
        // CarModel::create([
        //     "name_ar" => "xdrive 30 i",
        //     "name_en" => "xdrive 30 i",
        //     "meta_keyword_ar" => "xdrive 30 i",
        //     "meta_keyword_en" => "xdrive 30 i",
        //     "meta_desc_ar" => "xdrive 30 i",
        //     "meta_desc_en" => "xdrive 30 i",
        //     "parent_model_id" => 3,
        //     "brand_id" => 2,
        // ]);
    }
}

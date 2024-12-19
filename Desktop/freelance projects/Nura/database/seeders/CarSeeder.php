<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Car::create([
                "name_ar" => "مرسيدس S500 4matic 2022",
                "name_en" => "mercedes S500 4matic 2022",
                "images" => "mercedes images",
                "vendor_id" => 1,
                "city_id" => 1,
                "brand_id" => 1,
                "model_id" => 1,
                'color_id' => 1,
                'year' => 2022,
                'gear_shifter' => 'manual',
                'supplier' => 'gulf',
                'fuel_type' => 'asdfhfhrftyhrt',
                'description_ar' => 'asdfhfhrftyhrt',
                'description_en' => 'asdfhfhrftyhrt',
                'price' => 500000,
            ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
            'name_ar' => 'مصر',
            'name_en' => 'Masr',
            'image' => 'webstdy_1648022291bmw_car_internal_images_3b.jpg',
        ]);

        Bank::create([
            'name_ar' => 'قطر',
            'name_en' => 'QNB',
            'image' => 'webstdy_1648022291bmw_car_internal_images_4.jpg',
        ]);
    }
}

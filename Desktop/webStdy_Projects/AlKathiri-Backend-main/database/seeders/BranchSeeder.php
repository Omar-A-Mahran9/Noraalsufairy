<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\City;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $status = ['visible','invisible'];
        $type = ['show_room','maintenance_center','3s_center'];
        foreach(City::pluck('id') as $id)
        {
            shuffle($status);
            shuffle($type);
            Branch::create([
                'name_ar' => $faker->name,
                'name_en' => $faker->name,
                'address_ar' => $faker->name,
                'address_en' => $faker->name,
                'email' => $faker->name,
                'phone' => $faker->name,
                'whatsapp' => $faker->name,
                'google_map_url' => $faker->name,
                'time_of_work_ar' => $faker->name,
                'time_of_work_en' => $faker->name,
                'frame' => $faker->name,
                'status' => $status[0],
                'type' => $type[0],
                'city_id' => $id,
            ]);
        }
    }
}

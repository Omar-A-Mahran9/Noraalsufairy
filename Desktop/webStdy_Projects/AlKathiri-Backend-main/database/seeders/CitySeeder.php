<?php

namespace Database\Seeders;

use App\Models\City;
use DB;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = resource_path('sql/cities.sql');
        DB::unprepared(file_get_contents($path));
    }
}

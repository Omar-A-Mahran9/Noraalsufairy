<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            RoleSeeder::class,
            SectorSeeder::class,
            BankSeeder::class,
            ColorSeeder::class,
            TagSeeder::class,
            BrandSeeder::class,
            ModelSeeder::class,
            CitySeeder::class,
            CarSeeder::class,
        ]);
    }
}

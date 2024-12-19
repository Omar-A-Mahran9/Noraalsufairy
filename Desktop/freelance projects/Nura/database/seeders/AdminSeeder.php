<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'employee',
            'email' => 'employee@example.com',
            'password' => 123123123,
            'phone' => '1234567890',
        ]);

        Employee::create([
            'name' => 'webstdy',
            'email' => 'support@webstdy.com',
            'password' => 123123123,
            'phone' => '01000000000',
        ]);
    }
}

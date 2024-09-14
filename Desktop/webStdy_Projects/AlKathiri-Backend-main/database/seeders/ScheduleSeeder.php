<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = Branch::pluck('id');

        foreach($branches as $branch)
        {
            Schedule::create([
                'day_of_week' => 'saturday',
                'is_available' => 1,
                'branch_id' => $branch
            ]);
            
            Schedule::create([
                'day_of_week' => 'sunday',
                'is_available' => 1,
                'branch_id' => $branch
            ]);
            Schedule::create([
                'day_of_week' => 'monday',
                'is_available' => 1,
                'branch_id' => $branch
            ]);
            Schedule::create([
                'day_of_week' => 'tuesday',
                'is_available' => 1,
                'branch_id' => $branch
            ]);
            Schedule::create([
                'day_of_week' => 'wednesday',
                'is_available' => 1,
                'branch_id' => $branch
            ]);
            Schedule::create([
                'day_of_week' => 'thursday',
                'is_available' => 1,
                'branch_id' => $branch
            ]);
            Schedule::create([
                'day_of_week' => 'friday',
                'is_available' => 1,
                'branch_id' => $branch
            ]);
        }

    }
}

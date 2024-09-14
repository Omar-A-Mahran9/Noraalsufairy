<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['maintenance_time'];
    protected $casts   = [
        "start_time" => "datetime:H:i",
        "end_time" => "datetime:H:i",
    ];


    public static function updateSchedules()
    {

        /** update or create if exist **/
        foreach(config('app.days') as $day){
            $isAvailable = false;
            $schedules = request()->schedules;

            if(array_key_exists('is_available', $schedules[$day]))
                if($schedules[$day]['is_available'] != 0)
                    $isAvailable = true;

            Schedule::updateOrCreate(
                [
                    'day_of_week' => $day,
                    'branch_id' => request()->branch_id
                ],
                [
                    'is_available' => $isAvailable,
                    'start_time' => $schedules[$day]['start_time'],
                    'end_time' => $schedules[$day]['end_time'],
                ]
            );
        }
    }

    
}

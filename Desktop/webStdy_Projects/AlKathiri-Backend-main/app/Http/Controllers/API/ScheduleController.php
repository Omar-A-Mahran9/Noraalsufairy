<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Services\ScheduleService;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function timeSlots(Request $request)
    {
        $request->validate(['date' => 'required|date|after_or_equal:today']);
        if(!settings()->get('maintenance_time'))
        {
            return [];
        }

        return (new ScheduleService())->timeSlots($request);
    }
}

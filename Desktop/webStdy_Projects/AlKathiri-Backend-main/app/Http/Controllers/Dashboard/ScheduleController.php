<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchedulesRequest;
use App\Models\Branch;
use App\Services\ScheduleService;

class ScheduleController extends Controller
{

    public function index(Request $request)
    {
        $schedules = Schedule::where('branch_id',$request->branch_id)->get();
        if($request->ajax())
        {
            return response()->json(['schedules' => $schedules]);
        }
        $branches = Branch::where(function($query){
            $query->where('type', 'maintenance_center')->orWhere('type', '3s_center');
        })->get();
        
        return view('dashboard.schedules.index', compact('schedules','branches'));
    }

    public function store(StoreSchedulesRequest $request)
    {
        Schedule::updateSchedules();
        // settings()->set('maintenance_time' , $request->maintenance_time);
        Branch::find($request->branch_id)->update([
            'capacity_of_cars_per_time' => $request->capacity_of_cars_per_time,
            'maintenance_time' => $request->maintenance_time,
            'start_rest' => $request->start_rest,
            'end_rest' => $request->end_rest,

        ]);

        return response()->json("schedules saved successfully");
    }

    public function timeSlots(Request $request)
    {
        $request->validate(['date' => 'required|date']);

        return (new ScheduleService())->timeSlots($request);
    }

}

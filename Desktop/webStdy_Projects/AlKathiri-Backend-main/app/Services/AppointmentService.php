<?php
namespace App\Services;

use Carbon\Carbon;
use App\Models\Schedule;
use App\Models\Appointment;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AppointmentService {

    public function store($request)
    {
        $appointment = null;
        $time = Carbon::createFromFormat('h:i A',$request->time);
        $branch = Branch::find($request->branch_id);
        $appointmentCheck = Appointment::where('status', '!=', 'cancelled')
        ->whereDate('date', $request->date)
        ->whereTime('time', '=', $time->format('H:i:s'))
        ->where('branch_id',$request->branch_id)
        ->count();
        if($appointmentCheck > $branch->capacity_of_cars_per_time)
        {
            throw ValidationException::withMessages([
                'branch' => __("This branch reached it's maximum of appointments")
            ]);
        }
        if ($branch->capacity_of_cars_per_time > $appointmentCheck){
            $data = $request->validated();
            $data['time'] = $time->format('H:i');

            $appointment = Appointment::create($data);
            $appointment->with(['branch', 'city']);
        }

        return $appointment;
    }
}

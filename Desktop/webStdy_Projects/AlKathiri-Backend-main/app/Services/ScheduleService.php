<?php
namespace App\Services;

use App\Models\Appointment;
use App\Models\Branch;
use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleService {


    public function timeSlots(Request $request)
    {
        $branch = Branch::find($request->branch_id ?? $request->branchId);
        if($branch == null)
        {
            return [];
        }
        $date = Carbon::createFromFormat('Y-m-d', $request->date);
        $currentDate = Carbon::today();
        $currentTime = Carbon::now()->format('h:i A'); // Format the current time as a 12-hour string

        $schedules = Schedule::where('branch_id',$branch->id)->get();
        $dayShift = $schedules->where('day_of_week', lcfirst($date->format('l')))->first();

     if (isset($dayShift->is_available) && $dayShift->is_available != null) {
        $timeSlots = $this->generateTimeSlots($dayShift, $date, $branch);

          // If the requested date is today, filter out past time slots
          if ($date->isSameDay($currentDate)) {
            $timeSlots = array_filter($timeSlots, function($timeSlot) use ($currentTime) {
                // Convert the value from "h:i A" to "H:i"
                
$slotTime = Carbon::createFromFormat('h:i A', $timeSlot['value']);
            $currentTime = Carbon::createFromFormat('h:i A', $currentTime);
            return $slotTime->greaterThan($currentTime);            });
        }

        return array_values($timeSlots); // Reset array keys after filtering
    }
    }


    public static function generateTimeSlots($dayShift, $date,$branch)
    {
        $timeSlots = [];
        $startTime = $dayShift->start_time;
        $appointments = Appointment::where('status', '!=', 'cancelled')
        ->whereDate('date', $date->format('Y-m-d'))
        ->where('branch_id',$dayShift->branch_id)
        ->get();
        $startRest = Carbon::createFromFormat('H:i', $branch->start_rest)->subMinutes($branch->maintenance_time-5);
        $endRest = Carbon::createFromFormat('H:i', $branch->end_rest)->subMinutes($branch->maintenance_time);
        while ($startTime?->lte($dayShift->end_time)){
            if($startTime->between($startRest,$endRest) == false)
            {
                array_push($timeSlots, [
                    'time' =>  $startTime->translatedFormat('h:i A'),
                    'value' =>  $startTime->format('h:i A'),
                    'available' => $appointments->filter(function($appointment) use($startTime){
                        return $appointment->time->eq($startTime->format('H:i'));
                    })->count() < $branch->capacity_of_cars_per_time,
                ]);

            }

            $startTime->addMinutes($branch->maintenance_time);
            // $startTime->addMinutes(settings()->get('maintenance_time'));
        }

        return $timeSlots;
    }
}

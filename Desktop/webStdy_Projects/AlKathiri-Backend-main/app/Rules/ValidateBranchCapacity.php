<?php

namespace App\Rules;

use App\Models\Appointment;
use App\Models\Branch;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class ValidateBranchCapacity implements Rule
{
    private $appointment;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $branch = Branch::find($value);
        $time = Carbon::createFromFormat('h:i A', request()->time);

        $appointmentCheck = Appointment::where('status', '!=', 'cancelled')
        ->whereDate('date', request()->date)
        ->whereTime('time', '=', $time->format('H:i:s'))
        ->where('branch_id',$value)
        ->count();

        if($this->appointment && $this->appointment->branch_id == $value && $this->appointment->time == $time->format('H:i:s') && $this->appointment == request()->date ? $appointmentCheck > $branch->capacity_of_cars_per_time : $appointmentCheck >= $branch->capacity_of_cars_per_time)
        {
            return FALSE;
        }

        return TRUE;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __("This branch reached it's maximum of appointments in this time selected");
    }
}

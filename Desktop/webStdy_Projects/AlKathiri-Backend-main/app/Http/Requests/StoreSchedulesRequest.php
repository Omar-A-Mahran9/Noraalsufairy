<?php

namespace App\Http\Requests;

use App\Models\Branch;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSchedulesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'maintenance_time' => 'required|numeric|min:15',
            'capacity_of_cars_per_time' => 'required|numeric|min:1',
            'schedules.*.start_time' => 'required_if:schedules.*.is_available,on|nullable|date_format:H:i',
            'schedules.*.end_time' => 'required_if:schedules.*.is_available,on|nullable|date_format:H:i|after:schedules.*.start_time',
            'branch_id' => ['required',Rule::in(Branch::pluck('id'))]
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Rules\ExcludeModelNameIfModelId;
use App\Rules\ValidateBranchCapacity;
use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
        $appointment = $this->route('appointment');

        return [
            "model_id" => "required_without:model_name|nullable|exists:models,id",
            "city_id" => "required|exists:cities,id",
            "branch_id" => ["required", "exists:branches,id", new ValidateBranchCapacity($appointment)],
            "model_name" => ["nullable", "string", new ExcludeModelNameIfModelId],
            "maintenance_type" => ['required', 'in:Periodic Maintenance,Guarantee,Plumbing And Painting,Other'],
            "name" => "required|string:255",
            "phone" => 'required|numeric',
            'email' => 'required|string|max:255|email:rfc,dns',
            "description" =>'required|string',
            "model_year" => 'required|digits:4|integer|min:1901|max:'.(date('Y')+1),
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:h:i A',
            'terms_and_privacy' => 'accepted',
        ];
    }
}

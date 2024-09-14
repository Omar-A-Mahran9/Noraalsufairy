<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCorporatesOrderRequest extends FormRequest
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
            'cars.*.car_name' => ['required','string'],
            'cars.*.count' => ['required','min:1'],
            'payment_type' => 'required|in:cash,finance',
            'organization_name' => 'required|string|max:255',
            'organization_ceo' => 'required|max:255',
            'phone' => 'required|numeric',
            'organization_email' => 'required|max:255|email:rfc,dns',
            'city_id' => 'required|exists:cities,id',
            'organization_location' => 'required|max:255',
            'organization_activity' => 'required|max:255',
            'organization_age' => 'required|min:1',
        ];
    }
}

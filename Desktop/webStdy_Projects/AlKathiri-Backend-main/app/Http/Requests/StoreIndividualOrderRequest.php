<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIndividualOrderRequest extends FormRequest
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
            'payment_type' => "required|in:cash,finance",
            'car_id' => "required|exists:cars,id",
            'color_id' => "required|exists:colors,id",
            'name' => "required|max:255",
            'phone' => "required|numeric",
            'age' => "required_if:payment_type,finance|nullable|numeric",
            'salary' => "required_if:payment_type,finance|nullable|numeric|min:3000",
            'commitments' => "required_if:payment_type,finance|nullable|min:1",
            'having_loan' => "required_if:payment_type,finance|nullable|in:1,0",
            'having_personal_loan' => "required_if:payment_type,finance|nullable|in:1,0",
            'finance_duration' => "required_if:payment_type,finance|nullable",
            'funding_organization_type' => ['required_if:payment_type,finance', 'in:company,same_bank,bank'],
            'funding_organization_id' => ['required_if:funding_organization_type,company', 'exists:funding_organizations,id'],
            'funding_bank_id' => ['required_if:payment_type,finance && required_if:funding_organization_type,bank', 'exists:banks,id'],
            'city_id' => "required|exists:cities,id",
            'work' => "required_if:payment_type,finance|nullable|string|max:255",
            'bank_id' => "required_if:payment_type,finance|exists:banks,id",
            'sector' => "required_if:payment_type,finance|in:governmental,private",
            'id_and_driving_license' => 'nullable|image|max:4096',
            'salary_identification' => 'nullable|image|max:4096',
            'insurance_print' => 'nullable|image|max:4096',
            'account_statement' => 'nullable|image|max:4096',
        ];


    }
}

<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('create_packages');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar'    => 'required | string | max:255 | unique:packages',
            'name_en'    => 'required | string | max:255 | unique:packages',
            'description_ar'    => 'required | string | unique:packages',
            'description_en'    => 'required | string | unique:packages',
            'monthly_price' => 'required|numeric',
            'annual_price' => 'required|numeric',
            'features' => 'required|array|min:1',
            'features.*' => 'required|exists:features,id',
            'discount_flag' => 'required|numeric',
            'values' => 'required|array|min:1',
            'values.*' => 'required|numeric',
            'monthly_price_after_discount' => 'required_if:discount_flag,1|nullable|nullable|numeric',
            'annual_price_after_discount' => 'required_if:discount_flag,1|nullable|numeric',
            'discount_from_date' => 'required_if:discount_flag,1|nullable|date',
            'discount_to_date' => 'required_if:discount_flag,1|nullable|date',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCareerRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => "required|max:255|email:rfc,dns",
            'phone' => 'required|numeric',
            'cv' => 'required|file|max:4096',
            'city_id' => 'required|exists:cities,id',
            'comment' => 'nullable|string|max:255',
        ];
    }
}

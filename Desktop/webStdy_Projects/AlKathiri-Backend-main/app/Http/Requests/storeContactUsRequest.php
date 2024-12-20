<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeContactUsRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email:rfc,dns',
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ];
    }
}

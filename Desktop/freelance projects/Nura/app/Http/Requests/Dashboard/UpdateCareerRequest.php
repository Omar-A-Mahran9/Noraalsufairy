<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCareerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_careers');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'             => ['required','string','max:255'],
            'address'           => ['required','string','max:255'],
            'short_description' => ['required','string'],
            'long_description'  => ['required','string'],
            'city_id'           => ['required'],
        ];
    }
}

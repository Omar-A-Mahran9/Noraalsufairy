<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_cities');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $city = request()->route('city');

        return [
            'name_ar'    => [ 'required','string','max:255','unique:cities,id,' . $city->id ],
            'name_en'    => [ 'required','string','max:255','unique:cities,id,' . $city->id ],
        ];
    }
}

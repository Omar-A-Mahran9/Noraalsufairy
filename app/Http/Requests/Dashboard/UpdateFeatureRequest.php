<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeatureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_tags');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $feature = request()->route('feature');
        return [
            'name_ar'    => "required | string | max:255 | unique:features,name_ar,$feature->id",
            'name_en'    => "required | string | max:255 | unique:features,name_en,$feature->id",
        ];
    }
}

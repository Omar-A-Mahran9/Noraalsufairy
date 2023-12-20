<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('create_branches');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar'       => 'required | string | max:255 ',
            'name_en'       => 'required | string | max:255 ',
            'address_ar'    => 'required | string | max:255 ',
            'address_en'    => 'required | string | max:255 ',
            'phone'         => ['required','numeric','unique:branches'],
            'whatsapp'      => ['required','numeric','unique:branches'],
            'frame'         => 'required | string',
            'status'        => 'required | in:invisible,visible',
            'lat'           => 'required',
            'lng'           => 'required',
            'city_id'       => 'required',
        ];
    }
}

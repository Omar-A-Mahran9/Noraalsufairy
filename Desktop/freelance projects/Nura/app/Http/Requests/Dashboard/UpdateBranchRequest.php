<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_branches');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $branch = request()->route('branch');

        return [
            'name_ar'       => 'required | string | max:255 | unique:branches,name_ar,' . $branch->id,
            'name_en'       => 'required | string | max:255 | unique:branches,name_en,' . $branch->id,
            'address_ar'    => 'required | string | max:255 | unique:branches,address_ar,' . $branch->id,
            'address_en'    => 'required | string | max:255 | unique:branches,address_en,' . $branch->id,
            'phone'         => ['required','numeric','unique:branches,phone,' . $branch->id],
            'whatsapp'      => ['required','numeric','unique:branches,whatsapp,' . $branch->id],
            'status'        => 'required | in:invisible,visible',
            'frame'         => 'required | string',
            'lat'           => 'required',
            'lng'           => 'required',
            'city_id'       => 'required',
        ];
    }
}

<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('create_employees');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'phone'     => ['required','numeric','unique:employees'],
            'password'  => ['required','string','min:6','max:255','confirmed'],
            'password_confirmation' => ['required','same:password'],
            'email'     => ['required','string', "email:rfc,dns",'unique:employees'],
            'roles'     => ['required','array','min:1'],
        ];
    }
}

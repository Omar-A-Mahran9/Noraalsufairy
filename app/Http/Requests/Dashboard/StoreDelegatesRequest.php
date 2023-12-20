<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreDelegatesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('create_delegates');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:5|max:255',
            'phone' => 'required|numeric|unique:delegates',
            'commission' => 'required|numeric',
            'IBAN' => 'required|string|max:255',
            'bank_id' => 'required|exists:banks,id',
        ];
    }
}

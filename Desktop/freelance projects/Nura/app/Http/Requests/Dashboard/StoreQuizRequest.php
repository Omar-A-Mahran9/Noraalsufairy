<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuizRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('create_books');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar'    => ['required' , 'string' , 'max:255'  ,new NotNumbersOnly()],
            'name_en'    => ['required' , 'string' , 'max:255' ,new NotNumbersOnly()],
            'description_ar' => ['required', 'string'],
            'description_en' => ['required', 'string'],
            'from' => ['required','date'],
            'to' => ['required','date'],
            'course_id'       => 'required',
            'duration'       => 'required',
            'section_id'       => 'required',
            'open'       => '',

        ];
           
}
}

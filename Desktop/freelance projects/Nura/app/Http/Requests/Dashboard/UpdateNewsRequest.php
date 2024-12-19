<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_news');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => ['required','string','max:255'],
            'tags'          => ['required','string','max:255'],
            'description'   => ['required','string'],
            'main_image'    => ['nullable','mimes:webp','max:2048'],
            'cover_image'   => ['nullable','mimes:webp','max:2048'],
        ];
    }
}

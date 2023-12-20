<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('create_news');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_ar'         => ['required', 'string', 'max:255'],
            'title_en'         => ['required', 'string', 'max:255'],
            // 'tags'          => ['required','string','max:255'],
            'description_ar'   => ['required', 'string'],
            'description_en'   => ['required', 'string'],
            'main_image'    => ['required', 'mimes:webp', 'max:2048'],
            'highlighted_image'   => ['required_with:highlighted_news', 'mimes:webp', 'max:2048'],
        ];
    }
}
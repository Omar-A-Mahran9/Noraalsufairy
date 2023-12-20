<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_brands');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $brand = request()->route('brand');

        return [
            'name_ar'         => ["required", "string", "max:255", "unique:brands,name_ar,$brand->id"],
            'name_en'         => ["required", "string", "max:255", "unique:brands,name_en,$brand->id"],
            'meta_keyword_ar' => 'nullable|string|max:255' ,
            'meta_keyword_en' => 'nullable|string|max:255' ,
            'meta_desc_en'    => 'nullable|string|max:255' ,
            'meta_desc_ar'    => 'nullable|string|max:255' ,
            'image'           => 'nullable|mimes:webp|max:2048' ,
            'cover'           => 'nullable|mimes:webp|max:2048' ,
        ];
    }
}

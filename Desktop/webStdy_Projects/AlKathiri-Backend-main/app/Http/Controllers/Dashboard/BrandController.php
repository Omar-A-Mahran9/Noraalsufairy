<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_brands');

        if ( $request->ajax() ) {

            $brands = getModelData( model: new Brand() , searchingColumns: ['name_ar', 'name_en'] );

            return response()->json($brands);
        }

        return view('dashboard.brands.index');
    }

    public function create()
    {
        $this->authorize('create_brands');
        return view('dashboard.brands.create');
    }


    public function store(Request $request)
    {
        $this->authorize('create_brands');

        $data = $request->validate([
            'name_ar'         => 'required|string|max:255|unique:brands' ,
            'name_en'         => 'required|string|max:255|unique:brands' ,
            'meta_keyword_ar' => 'nullable|string|max:255' ,
            'meta_keyword_en' => 'nullable|string|max:255' ,
            'meta_desc_en'    => 'nullable|string|max:255' ,
            'meta_desc_ar'    => 'nullable|string|max:255' ,
            'image'           => 'required|mimes:jpeg,jpg,png,gif,svg,webp|max:2048' ,
            'cover'           => 'required|mimes:jpeg,jpg,png,gif,svg,webp|max:2048' ,
        ]);


        if ($request->file('image'))
            $data['image'] = uploadImage( $request->file('image') , "Brands");

        if ($request->file('cover'))
            $data['cover'] = uploadImage( $request->file('cover') , "Brands");


        if ( $request->file('image') && $request['hex_code'])
            $data['hex_code'] = null;


        Brand::create($data);

    }

    public function show(Brand $brand)
    {
        $this->authorize('show_brands');

        return view('dashboard.brands.show',compact('brand'));
    }

    public function edit(Brand $brand)
    {
        $this->authorize('update_brands');

        return view('dashboard.brands.edit',compact('brand'));
    }

    public function update(Request $request,Brand $brand)
    {
        $this->authorize('update_brands');

        $data = $request->validate([
            'name_ar'         => ['required', 'string', 'max:255', Rule::unique('brands')->ignore($brand->id)],
            'name_en'         => ['required', 'string', 'max:255', Rule::unique('brands')->ignore($brand->id)],
            'meta_keyword_ar' => 'nullable|string|max:255' ,
            'meta_keyword_en' => 'nullable|string|max:255' ,
            'meta_desc_en'    => 'nullable|string|max:255' ,
            'meta_desc_ar'    => 'nullable|string|max:255' ,
            'image'           => 'nullable|mimes:jpeg,jpg,png,gif,svg,webp|max:2048' ,
            'cover'           => 'nullable|mimes:jpeg,jpg,png,gif,svg,webp|max:2048' ,
        ]);


        if ($request->file('image'))
        {
            deleteImage( $brand['image'] , "Brands");
            $data['image'] = uploadImage( $request->file('image') , "Brands");
        }

        if ($request->file('cover'))
        {
            deleteImage( $brand['cover'] , "Brands");
            $data['cover'] = uploadImage( $request->file('cover') , "Brands");
        }

        $brand->update($data);


    }

    public function destroy(Request $request,Brand $brand)
    {
        $this->authorize('delete_brands');

        if ($request->ajax())
        {
            if($brand->cars->count() > 0)
                throw ValidationException::withMessages([
                    'brand' => __("This brand is assigned to cars and can't be deleted")
                ]);

            $brand->delete();
        }

    }


    public function parentModels(Brand $brand)
    {
        $parentModels = $brand?->parentModels()->select('id','name_'.getLocale())->get();

        return response()->json([
            'models' => $parentModels
        ]);
    }

    public function models(Brand $brand)
    {
        return response()->json($brand->parentModels);
    }
}

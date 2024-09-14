<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\CarModelImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_models');

        if ( $request->ajax() )
        {
            $relations     = [ 'brand' => [ 'id','name_' . getLocale() ] ];
            $andsFilters   = $request['type'] == 'parent' ? [ [ 'parent_model_id' , '=' , null ] ] : [ [ 'parent_model_id' , '!=' , null ] ];
            $models        = getModelData( model : new CarModel() , andsFilters : $andsFilters , relations : $relations );

            return response()->json($models);
        }

        return view('dashboard.models.index');
    }

    public function create()
    {
        $this->authorize('create_models');
        $brands        = Brand::select('id','name_' . getLocale())->get();

        return view('dashboard.models.create',compact('brands'));
    }


    public function store(Request $request)
    {
        $this->authorize('create_models');

        $data = $request->validate([
            'name_ar'         => 'required|string|max:255' ,
            'name_en'         => 'required|string|max:255' ,
            'meta_keyword_ar' => 'nullable|string|max:255' ,
            'meta_keyword_en' => 'nullable|string|max:255' ,
            'meta_desc_en'    => 'nullable|string|max:255' ,
            'meta_desc_ar'    => 'nullable|string|max:255' ,
            'brand_id'        => 'required',
            'parent_model_id' => 'required_if:model_type,sub',
            'images'          => 'required',
        ]);


        $model = CarModel::where('name_ar',$data['name_ar'])->where('brand_id',$data['brand_id'])->first();

        if($model)
        {
            throw ValidationException::withMessages([
                'name_ar' => __("Name in arabic already exists")
            ]);
        }

        $model = CarModel::where('name_en',$data['name_en'])->where('brand_id',$data['brand_id'])->first();
        if($model)
        {
            throw ValidationException::withMessages([
                'name_en' => __("Name in english already exists")
            ]);
        }


        $model = CarModel::create($data);
        foreach($request->file('images') as $file)
        {
            $image = uploadImage( $file , "CarModelImages");
            CarModelImage::create([
                'model_id' => $model->id,
                'image' => $image
            ]);
        }

    }

    public function show(CarModel $model)
    {
        $this->authorize('show_models');

        return view('dashboard.models.show',compact('model'));
    }

    public function edit(CarModel $model)
    {
        $this->authorize('update_models');

        $brands        = Brand::select('id','name_' . getLocale())->get();

        return view('dashboard.models.edit',compact('model','brands'));
    }

    public function update(Request $request, CarModel $model)
    {
        $this->authorize('update_models');

        $data = $request->validate([
            'name_ar'         => 'required|string|max:255' ,
            'name_en'         => 'required|string|max:255' ,
            'meta_keyword_ar' => 'nullable|string|max:255' ,
            'meta_keyword_en' => 'nullable|string|max:255' ,
            'meta_desc_en'    => 'nullable|string|max:255' ,
            'meta_desc_ar'    => 'nullable|string|max:255' ,
            'brand_id'        => 'required',
            'parent_model_id' => 'required_if:model_type,sub'
        ]);

        if($request['model_type'] == 'parent')
        {
            $existentModel = CarModel::where('name_ar',$data['name_ar'])->where('brand_id',$data['brand_id'])->where('id','!=',$model->id)->first();

            if($existentModel)
            {
                throw ValidationException::withMessages([
                    'name_ar' => __("Name in arabic already exists")
                ]);
            }

            $existentModel = CarModel::where('name_en',$data['name_en'])->where('brand_id',$data['brand_id'])->where('id','!=',$model->id)->first();
            if($existentModel)
            {
                throw ValidationException::withMessages([
                    'name_en' => __("Name in english already exists")
                ]);
            }
        }
        else
        {
            $existentModel = CarModel::where('name_ar',$data['name_ar'])->where('parent_model_id',$data['parent_model_id'])->where('id','!=',$model->id)->first();

            if($existentModel)
            {
                throw ValidationException::withMessages([
                    'name_ar' => __("Name in arabic already exists")
                ]);
            }

            $existentModel = CarModel::where('name_en',$data['name_en'])->where('parent_model_id',$data['parent_model_id'])->where('id','!=',$model->id)->first();
            if($existentModel)
            {
                throw ValidationException::withMessages([
                    'name_en' => __("Name in english already exists")
                ]);
            }
        }

        $model->update($data);

        if($request->hasFile('images'))
        {
            $model->images()->delete();
            foreach($request->file('images') as $file)
            {
                $image = uploadImage( $file , "CarModelImages");
                CarModelImage::create([
                    'model_id' => $model->id,
                    'image' => $image
                ]);
            }
        }

    }

    public function destroy(Request $request, CarModel $model)
    {
        $this->authorize('delete_models');

        if ($request->ajax())
        {
            if($model->cars->count() )
                throw ValidationException::withMessages([
                    'model' => __("This model is assigned to cars and can't be deleted")
                ]);

            $model->delete();
        }

    }

    public function getModelsByBrand($brandId)
    {
        $brands = Brand::with('parentModels')->where('id', $brandId)->first();
        return response()->json($brands->parentModels);
    }


}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ColorController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_colors');

        if ( $request->ajax() ) {

            $colors = getModelData( model: new Color() );

            return response()->json($colors);
        }

        return view('dashboard.colors.index');
    }

    public function create()
    {
        $this->authorize('create_colors');
        return view('dashboard.colors.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create_colors');

        if($request->color_type == 'image')
        {
            $data = $request->validate([
                'name_ar'     => ['required','string','max:255', 'unique:colors'] ,
                'name_en'     => ['required','string','max:255', 'unique:colors'] ,
                'image'       => ['required', 'image','mimes:jpeg,jpg,png,gif,svg,webp','max:4096'] ,
            ]);

            $data['image'] = uploadImage( $request->file('image') , "Colors");
        }
        else
        {
            $data = $request->validate([
                'name_ar'     => ['required','string','max:255', 'unique:colors'] ,
                'name_en'     => ['required','string','max:255', 'unique:colors'] ,
                'hex_code'    => ['required','unique:colors'] ,
            ]);
        }

        Color::create($data);
    }

    public function edit(Color $color)
    {
        $this->authorize('update_colors');

        return view('dashboard.colors.edit',compact('color'));
    }

    public function show(Color $color)
    {
        $this->authorize('show_colors');

        return view('dashboard.colors.show',compact('color'));
    }

    public function update(Request $request,Color $color)
    {
        $this->authorize('update_colors');
        
        if($request->color_type == 'image')
        {
            $data = $request->validate([
                'name_ar'     => ['required','string','max:255', 'unique:colors,name_ar,' . $color->id] ,
                'name_en'     => ['required','string','max:255', 'unique:colors,name_en,' . $color->id] ,
                'image'       => ['nullable', 'image','mimes:jpeg,jpg,png,gif,svg,webp','max:4096'] ,
            ]);
            
            if ($request->file('image'))
            {
                deleteImage( $color['image'] , "Colors");
                $data['image'] = uploadImage( $request->file('image') , "Colors");
            }
            else
                $data['image'] = $color['image'];
        }
        else
        {
            $data = $request->validate([
                'name_ar'     => ['required','string','max:255', 'unique:colors,name_ar,' . $color->id] ,
                'name_en'     => ['required','string','max:255', 'unique:colors,name_en,' . $color->id] ,
                'hex_code'    => ['required','unique:colors,hex_code,' . $color->id] ,
            ]);
        }


        if ( $request['color_type'] == 'color' )
            $data['image'] = null;
        else
            $data['hex_code'] = null;


        $color->update($data);


    }

    public function destroy(Request $request,Color $color)
    {
        $this->authorize('delete_colors');
        if ($request->ajax())
        {
            if($color->cars->count() > 0)
                throw ValidationException::withMessages([
                    'color' => __("This color is assigned to cars and can't be deleted")
                ]);

            $color->delete();
        }

    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_cities');

        if ($request->ajax())
        {
            $data = getModelData( model: new City() );

            return response()->json($data);
        }

        return view('dashboard.cities.index');
    }

    public function create()
    {
        $this->authorize('create_cities');

        return view('dashboard.cities.create');
    }


    public function edit(City $city)
    {
        $this->authorize('update_cities');
        return view('dashboard.cities.edit',compact('city'));
    }


    public function show($is)
    {
        abort(404);
    }

    public function store(Request $request)
    {

        $this->authorize('create_cities');

        $data = $request->validate([
            'name_ar'    => ['required','string','max:255','unique:cities'],
            'name_en'    => ['required','string','max:255','unique:cities'],
        ]);


        City::create($data);

    }

    public function update(Request $request , City $city)
    {
        $this->authorize('update_cities');

        $data = $request->validate([
            'name_ar'    => [ 'required','string','max:255','unique:cities,name_ar,' . $city->id ],
            'name_en'    => [ 'required','string','max:255','unique:cities,name_en,' . $city->id ],
        ]);


        $city->update($data);
    }


    public function destroy(Request $request, City $city)
    {
        $this->authorize('delete_cities');

        if($request->ajax())
        {
            $city->delete();
        }
    }

    public function branches(City $city)
    {
        $branches = $city->branches()
        ->where(function($query) {
            $query->where('type', 'maintenance_center')
                  ->orWhere('type', '3s_center');
        })
        ->has('schedule')
        ->get();
            return response()->json($branches);
    }
}

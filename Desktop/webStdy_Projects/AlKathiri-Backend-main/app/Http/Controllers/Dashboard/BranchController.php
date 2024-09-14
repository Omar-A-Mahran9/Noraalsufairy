<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\City;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_branches');

        if ($request->ajax())
        {
            $data = getModelData( model: new Branch()  , relations:[ 'city' => ['id','name_' .getLocale()]], searchingColumns:['name_' . getLocale(), 'address_' . getLocale(), 'phone', 'whatsapp']);

            return response()->json($data);
        }

        $cities = City::get();

        return view('dashboard.branches.index',compact('cities'));
    }

    public function create()
    {
        $this->authorize('create_branches');
        $cities = City::select('id','name_' . getLocale() )->get();

        return view('dashboard.branches.create',compact('cities'));
    }


    public function edit(Branch $branch)
    {
        $this->authorize('update_branches');

        $cities         = City::select('id','name_' . getLocale() )->get();
        [ $lat , $lng ] = getCoordinates($branch['google_map_url']);


        return view('dashboard.branches.edit',compact('branch','cities','lat','lng'));
    }

    public function show(Branch $branch)
    {
        $this->authorize('show_branches');

        [ $lat , $lng ] = getCoordinates($branch['google_map_url']);

        return view('dashboard.branches.show',compact('branch','lat','lng'));
    }

    public function store(Request $request)
    {

        $this->authorize('create_branches');

        $data = $request->validate([
            'name_ar'       => 'required | string | max:255 ',
            'name_en'       => 'required | string | max:255 ',
            'address_ar'    => 'required | string | max:255 ',
            'address_en'    => 'required | string | max:255 ',
            'email'         => 'required|string|max:255|email:rfc,dns',
            'phone'         => ['required','numeric'],
            'whatsapp'      => ['required','numeric'],
            'frame'         => 'required | string',
            'status'        => 'required | in:invisible,visible',
            'type'          => 'required | in:show_room,maintenance_center,3s_center',
            'time_of_work_ar' => 'required',
            'time_of_work_en' => 'required',
            'city_id'       => 'required',
        ]);
        $data['whatsapp'] = convertArabicNumbers($data['whatsapp']);
        $data['phone'] = convertArabicNumbers($data['phone']);
        $data['google_map_url'] = "https://www.google.com/maps/?q=" . $request['lat'] . "," . $request['lng'];

        Branch::create($data);

    }

    public function update(Request $request , Branch $branch)
    {
        $this->authorize('update_branches');

        $data = $request->validate([
            'name_ar'       => 'required | string | max:255 | unique:branches,name_ar,' . $branch->id,
            'name_en'       => 'required | string | max:255 | unique:branches,name_en,' . $branch->id,
            'address_ar'    => 'required | string | max:255 | unique:branches,address_ar,' . $branch->id,
            'address_en'    => 'required | string | max:255 | unique:branches,address_en,' . $branch->id,
            'email'         => 'required|string|max:255|email:rfc,dns',
            'phone'         => ['required','numeric'],
            'whatsapp'      => ['required','numeric'],
            'status'        => 'required | in:invisible,visible',
            'type'          => 'required | in:show_room,maintenance_center,3s_center',
            'time_of_work_ar' => 'required',
            'time_of_work_en' => 'required',
            'frame'         => 'required | string',
            'city_id'       => 'required',
        ]);
        $data['whatsapp'] = convertArabicNumbers($data['whatsapp']);
        $data['phone'] = convertArabicNumbers($data['phone']);
        $data['google_map_url'] = "https://www.google.com/maps/?q=" . $request['lat'] . "," . $request['lng'];

        $branch->update($data);
    }


    public function destroy(Request $request, Branch $branch)
    {
        $this->authorize('delete_branches');

        if($request->ajax())
        {
            $branch->delete();
        }
    }

    public function getBranchAvailableDays(Branch $branch)
    {
        return $branch->schedule->where('is_available', 0)->pluck('day_of_week');
    }
}

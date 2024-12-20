<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Vendor;
use App\Rules\EnumValue;
use App\Enums\VendorStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_vendors');

        if ($request->ajax())
        {
            $data = getModelData( model: new Vendor() );

            return response()->json($data);
        }

        return view('dashboard.vendors.index');
    }

    public function create()
    {
        $this->authorize('create_vendors');

        $cities = City::get();

        return view('dashboard.vendors.create', compact('cities'));
    }


    public function show(Vendor $vendor)
    {
        $this->authorize('show_vendors');
        return view('dashboard.vendors.show',compact('vendor'));
    }

    public function edit(Vendor $vendor)
    {
        $this->authorize('update_vendors');

        $cities = City::get();

        return view('dashboard.vendors.edit',compact('vendor', 'cities'));
    }

    public function store(Request $request)
    {

        $this->authorize('create_vendors');

        $data = $request->validate([
            'image' => ['required', 'image', 'max:4096'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'unique:vendors'],
            'another_phone' => ['nullable', 'numeric'],
            'address' => ['required','string','max:255'],
            'status' => ['required', new EnumValue(VendorStatus::class)],
            'type' => ['required', 'in:individual,exhibition,agency'],
            'city_id' => ['required', 'exists:cities,id'],
            'identity_no' => ['required_if:type,individual', 'nullable', 'numeric'],
            'commercial_registration_no' => ['required_if:type,agency,exhibition', 'nullable', 'numeric'],
            'google_maps_url' => ['nullable', 'url'],
        ]);

        $data['created_by'] = auth()->id();

        $data['phone'] = convertArabicNumbers($data['phone']);

        if($data['another_phone'])
            $data['another_phone'] = convertArabicNumbers($data['another_phone']);

        $data['password'] = Hash::make( $request['phone'] );
        $data['image'] = uploadImage($request->file('image'), 'Vendors');

        Vendor::create($data);

    }

    public function update(Request $request , Vendor $vendor)
    {
        $this->authorize('update_vendors');

        $data = $request->validate([
            'image' => ['nullable', 'image', 'max:4096'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'unique:vendors,phone,' . $vendor->id],
            'another_phone' => ['nullable', 'numeric'],
            'address' => ['required','string','max:255'],
            'status' => ['required', new EnumValue(VendorStatus::class)],
            'type' => ['required', 'in:individual,exhibition,agency'],
            'city_id' => ['required', 'exists:cities,id'],
            'identity_no' => ['required_if:type,individual', 'nullable', 'numeric'],
            'commercial_registration_no' => ['required_if:type,agency,exhibition', 'nullable', 'numeric'],
            'google_maps_url' => ['nullable', 'url'],
        ]);

        $data['phone'] = convertArabicNumbers($data['phone']);

        if($data['another_phone'])
            $data['another_phone'] = convertArabicNumbers($data['another_phone']);

        if($request->hasFile('image'))
        {
            deleteImage($vendor->image, 'Vendors');
            $data['image'] = uploadImage($request->file('image'), 'Vendors');
        }

        $vendor->update($data);
    }


    public function destroy(Request $request, Vendor $vendor)
    {
        $this->authorize('delete_vendors');

        if($request->ajax())
        {
            $vendor->delete();
        }
    }
}
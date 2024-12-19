<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Sector;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_banks');

        if ($request->ajax())
            return response()->json(getModelData( model: new Bank() ));
        else
            return view('dashboard.banks.index');
    }

    public function create()
    {
        $this->authorize('create_banks');
        $sectors = Sector::get();

        return view('dashboard.banks.create', compact('sectors'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->authorize('create_banks');

        $data = $this->validateRequestData();
        $data['image'] = uploadImage( $request->file('image') ,"Banks");

        $bank =Bank::create($data);
        $bank->attachSectors($data);
    }

    public function validateRequestData()
    {
        $ValidationArray = [
            // 'image'      => 'required|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'image'      => 'required|file|max:2048',
            'name_ar'    => 'required | string | max:255 | unique:banks',
            'name_en'    => 'required | string | max:255 | unique:banks',
            'accept_from_other_banks'    => 'required | boolean',

        ];
        foreach(Sector::get()->pluck('slug') as $sector){
            $ValidationArray[$sector.'.*'] = 'required|numeric|min:0';
        }

        return request()->validate($ValidationArray);
    }

    public function edit(Bank $bank)
    {
        $this->authorize('update_banks');
        $bankSectors = $bank->sectors->keyBy('slug');
        // dd($bankSectors);

        return view('dashboard.banks.edit',compact('bank', 'bankSectors'));
    }

    public function show($id)
    {
        abort(404);
    }

    public function update(Request $request, Bank $bank)
    {
        $this->authorize('update_banks');

        $data = $this->validateRequestForEditing($bank->id);
        $data['image'] = $this->updateImage($bank->image);
        $bank->update($data);
        $bank->attachSectors($data);
    }

    public function validateRequestForEditing($bankId)
    {
        $ValidationArray = [
            // 'image'      => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'image'      => 'nullable|file|max:2048',
            'name_ar'    => 'required | string | max:255 | unique:banks,id,' . $bankId,
            'name_en'    => 'required | string | max:255 | unique:banks,id,' . $bankId,
            'accept_from_other_banks'    => 'required | boolean',

        ];
        foreach(Sector::get()->pluck('slug') as $sector){
            $ValidationArray[$sector.'.*'] = 'required|numeric|min:0';
        }

        return request()->validate($ValidationArray);
    }

    public function updateImage($imageName)
    {
        if (request()->hasFile('image') )
        {
            deleteImage($imageName, "Banks");
             return uploadImage( request()->file('image') ,"Banks");
        }else{
            return $imageName;
        }
    }

    public function destroy(Request $request, Bank $bank)
    {
        $this->authorize('delete_banks');

        if($request->ajax())
        {
            $bank->sectors()->detach();
            $bank->delete();
        }
    }
}


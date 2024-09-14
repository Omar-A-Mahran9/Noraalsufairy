<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BankController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_banks');

        if ($request->ajax())
        {
            $data = getModelData( model: new Bank() );

            return response()->json($data);
        }

        return view('dashboard.banks.index');
    }

    public function create()
    {
        $this->authorize('create_banks');

        return view('dashboard.banks.create');
    }

    public function edit(Bank $bank)
    {
        $this->authorize('update_banks');

        return view('dashboard.banks.edit',compact('bank'));
    }

    public function show($id)
    {
        abort(404);
    }

    public function store(Request $request)
    {
        $this->authorize('create_banks');

        $data = $request->validate([
            'name_ar'    => 'required | string | max:255 | unique:banks',
            'name_en'    => 'required | string | max:255 | unique:banks',
            'image'      => 'required|mimes:jpeg,jpg,png,gif,svg,webp|max:2048',
            'owner_name' => ['nullable', 'string', 'max:255'],
            'account_no' => ['nullable', 'string', 'max:255'],
            'iban'       => ['nullable', 'string', 'max:255'],
        ]);

        $data['image'] = uploadImage( $request->file('image') ,"Banks");

        Bank::create($data);
    }


    public function update(Request $request, Bank $bank)
    {
        $this->authorize('update_banks');

        $data = $request->validate([
            'name_ar'         => ['required', 'string', 'max:255', Rule::unique('banks')->ignore($bank['id'])],
            'name_en'         => ['required', 'string', 'max:255', Rule::unique('banks')->ignore($bank['id'])],
            'image'      => 'nullable|mimes:jpeg,jpg,png,gif,svg,webp|max:2048',
            'owner_name' => ['nullable', 'string', 'max:255'],
            'account_no' => ['nullable', 'string', 'max:255'],
            'iban'       => ['nullable', 'string', 'max:255'],
        ]);

        if ($request->hasFile('image') )
        {
            deleteImage( $bank['image'] , "Banks");
            $data['image'] = uploadImage( $request->file('image') ,"Banks");
        }

            $bank->update($data);
    }

    public function destroy(Request $request, Bank $bank)
    {
        $this->authorize('delete_banks');

        if($request->ajax())
        {
            $bank->delete();
        }
    }
}


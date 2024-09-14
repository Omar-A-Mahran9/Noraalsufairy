<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_clients');

        if ($request->ajax())
        {
            $data = getModelData( model: new Client() );

            return response()->json($data);
        }

        return view('dashboard.clients.index');
    }

    public function create()
    {
        $this->authorize('create_clients');

        return view('dashboard.clients.create');
    }


    public function show(Client $client)
    {
        $this->authorize('show_clients');
        return view('dashboard.clients.show',compact('client'));
    }

    public function edit(Client $client)
    {
        $this->authorize('update_clients');
        return view('dashboard.clients.edit',compact('client'));
    }

    public function store(Request $request)
    {

        $this->authorize('create_clients');

        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'phone'    => ['required','string','max:255','unique:clients','regex:/(^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$)/u'],
            'email'    => ['required','string', "email:rfc,dns",'unique:clients'],
            'address'  => ['required','string','max:255'],
        ]);

        $data['password'] = Hash::make( $request['phone'] );

        Client::create($data);

    }

    public function update(Request $request , Client $client)
    {
        $this->authorize('update_clients');

        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'phone'    => ['required','string','max:255','unique:clients,id,' . $client['id'] ,'regex:/(^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$)/u'],
            'email'    => ['required','string', "email:rfc,dns",'unique:clients,id,' . $client['id'] ],
            'address'  => ['required','string','max:255'],
        ]);

        $client->update($data);
    }


    public function destroy(Request $request, Client $client)
    {
        $this->authorize('delete_clients');

        if($request->ajax())
        {
            $client->delete();
        }
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {

        $this->authorize('view_faq');

        if ($request->ajax())
        {

            $data = getModelData( model: new Faq() );

            return response()->json($data);

        }

        return view('dashboard.faq.index');
    }

    public function create()
    {
        $this->authorize('create_faq');

        return view('dashboard.faq.create');
    }


    public function edit(Faq $faq)
    {
        $this->authorize('update_faq');

        return view('dashboard.faq.edit',compact('faq'));
    }


    public function show(Faq $faq)
    {
        $this->authorize('show_faq');

        return view('dashboard.faq.show',compact('faq'));
    }

    public function store(Request $request)
    {
        $this->authorize('create_faq');

        $data = $request->validate([
            'question'  => 'required | string | max:255 | unique:faqs',
            'answer'    => 'required | string',
        ]);


        Faq::create($data);

    }

    public function update(Request $request , Faq $faq)
    {
        $this->authorize('update_faq');

        $data = $request->validate([
            'question'  => 'required | string | max:255 | unique:faqs,id,' . $faq->id,
            'answer'    => 'required | string',
        ]);


        $faq->update($data);

    }


    public function destroy(Request $request, Faq $faq)
    {
        $this->authorize('delete_faq');

        if($request->ajax())
        {
            $faq->delete();
        }
    }
}

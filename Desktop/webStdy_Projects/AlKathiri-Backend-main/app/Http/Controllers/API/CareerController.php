<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCareerRequest;
use App\Http\Resources\CareerResource;
use App\Models\Applicant;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CareerController extends Controller
{
    public function all(Request $request)
    {
        $careers = CareerResource::collection(Career::whereStatus(true)->get());

        return $careers;
    }

    public function apply(StoreCareerRequest $request, Career $career)
    {
        $data = $request->validated();
        if ($request->file('cv'))
            $data['cv'] = uploadImage( $request->file('cv') , "Applicants");

        $data['career_id'] = $career->id;

        $career->update([
            'city_id' => $data['city_id']
        ]);
        $applicant = Applicant::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'cv' => $data['cv'],
            'career_id' => $career->id,
            'comment' => $request->comment ? $data['comment'] : NULL,
        ]);

        /* try {
            Mail::send('mails.careers',[ 'applicant' =>  $applicant, 'career' => $career ],function($message) use($data){
                $message->to("hr@alkathirimotors.com")
                    ->cc('info@alkathirimotors.com')
                    ->subject(__('New Job Application'));
            });

        } catch (\Throwable $th) {
            dd($th->getMessage()) ;
        } */

        return response()->json('application created successfully');
    }
}

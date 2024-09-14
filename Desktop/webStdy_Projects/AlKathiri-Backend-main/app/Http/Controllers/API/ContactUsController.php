<?php

namespace App\Http\Controllers\API;

use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactUsResource;
use App\Http\Requests\storeContactUsRequest;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function store(storeContactUsRequest $request)
    {
        $contactUsRequest = ContactUs::create($request->validated());

        /* try {
            Mail::send('mails.contact-us',[ 'reply' =>  $contactUsRequest->reply, 'contactUs' => $contactUsRequest, 'web' => TRUE ],function($message) use ($contactUsRequest){
                $message->to("info@alkathirimotors.com");
            });

        } catch (\Throwable $th) {
            dd($th->getMessage()) ;
        } */

        return new ContactUsResource($contactUsRequest);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Models\Faq;
use App\Http\Controllers\Controller;
use App\Http\Resources\FaqResource;

class FaqController extends Controller
{
    public function all()
    {
        return FaqResource::collection(Faq::get());
    }
}

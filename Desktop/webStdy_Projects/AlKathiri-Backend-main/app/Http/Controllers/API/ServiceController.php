<?php

namespace App\Http\Controllers\API;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;

class ServiceController extends Controller
{
    public function all()
    {
        return ServiceResource::collection(Service::whereActive(true)->get());
    }
}

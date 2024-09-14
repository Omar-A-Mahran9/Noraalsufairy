<?php

namespace App\Http\Controllers\API;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;

class OfferController extends Controller
{
    public function all()
    {
        $offers = OfferResource::collection(Offer::whereStatus(true)->get());

        return $offers;
    }

    public function singleOffer(Offer $offer)
    {

        return [
            'offer' => new OfferResource($offer),
            'offer_cars' => CarResource::collection($offer->cars),
        ];
    }
}

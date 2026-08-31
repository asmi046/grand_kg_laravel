<?php

namespace App\Http\Controllers;

use App\Models\PriceOffer;

class PriceOfferController extends Controller
{
    public function index()
    {
        $priceOffers = PriceOffer::all();

        return view('prices', compact('priceOffers'));
    }
}

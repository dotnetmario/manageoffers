<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Offer;

use Auth;

class DashboardController extends Controller
{
    // show dashboard
    public function show(){
        
        // $offers = (new Offer)->getOffers(Auth::id());
        $offers = Auth::user()->offers()->get();

        return view('dashboard', compact('offers'));
    }
}

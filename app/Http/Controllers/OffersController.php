<?php

namespace App\Http\Controllers;

use App\Models\Offer;

use Illuminate\Http\Request;
use App\Http\Requests\offers\AddOfferRequest;
use App\Http\Requests\offers\EditActionOfferRequest;

use Auth;

class OffersController extends Controller
{

    // show and offer
    public function show(Request $request){
        $offer = Offer::findOrFail($request->id);

        $documents = $offer->documents()->get();
        $task = $offer->task()->first();

        // dd($offer);

        return view('offer', compact('offer', 'documents', 'task'));
    }

    // show create form
    public function create(){
        return view('manage-offers');
    }

    // add offer to database
    public function createAction(AddOfferRequest $request){
        $validated = $request->validated();

        $offer = (new Offer)->add(Auth::id(), $validated);

        return redirect()->route('dashboard');
    }

    // shows offer edit form
    public function edit(Request $request){
        // dd($request->id);
        $offer = Offer::findOrFail($request->id);

        // dd($offer);

        return view('manage-offers', compact('offer'));
    }


    // edit offer in database
    public function editAction(EditActionOfferRequest $request){
        $validated = $request->validated();

        // dd($validated);

        $offer = (new Offer)->edit($request->id, $validated);

        return redirect()->route('dashboard');
    }

    // delete an offer
    public function delete(Request $request){
        $offer = (new Offer)->deleteOffer($request->id);

        return redirect()->route('dashboard');
    }
}
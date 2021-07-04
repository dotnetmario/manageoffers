<?php

namespace App\Http\Controllers;

use App\Models\Document;

use Illuminate\Http\Request;
use App\Http\Requests\documents\AddDocumentRequest;
use App\Http\Requests\documents\EditActionDocumentRequest;

use Auth;

class DocumentsController extends Controller
{
    // show create form
    public function create(Request $request){

        // dd($request->offer);
        return view('manage-documents', ['offer' => $request->offer]);
    }

    // add document to database
    public function createAction(AddDocumentRequest $request){
        $validated = $request->validated();

        // dd($validated, $request->offer);

        $document = (new Document)->add($request->offer, $validated);

        return redirect()->route('offer', ['id' => $request->offer]);
    }

    // shows Document edit form
    public function edit(Request $request){
        $document = Document::findOrFail($request->id);
        $offer = $request->offer;

        return view('manage-documents', compact('offer', 'document'));
    }


    // edit document in database
    public function editAction(EditActionDocumentRequest $request){
        $validated = $request->validated();


        $document = (new Document)->edit($request->id, $validated);

        return redirect()->route('offer', ['id' => $request->offer]);
    }

    // delete an document
    public function delete(Request $request){
        $document = (new Document)->deleteDocument($request->id);

        return redirect()->route('offer', ['id' => $request->offer]);
    }
}

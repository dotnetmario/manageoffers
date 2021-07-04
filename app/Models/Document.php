<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'offer_id', 'name', 'description', 
    ];


    /**
     * Relations
     * 
     * 
     */

    // get the offer that owns the document
    public function offer(){
        return $this->belongsTo(User::class);
    }


    /**
     * CRUD
     * 
     * 
     */
    
    // creates an document in database
    public function add($offer, $data){
        return Document::create([
            'offer_id' => $offer,
            'name' => $data['name'],
            'description' => $data['description']
        ]);
    }

    // edits an document
    public function edit($id, $data){
        return Document::where('id', $id)
                ->update([
                    'name' => $data['name'],
                    'description' => $data['description']
                ]);
    }

    // delete document
    public function deleteDocument($id){
        return Document::where('id', $id)
                ->delete();
    }

}

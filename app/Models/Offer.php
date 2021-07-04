<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'task_id', 'name', 'description', 
    ];



    /**
     * Relations
     * 
     * 
     */

    // get the user owner of the offer
    public function user(){
        return $this->belongsTo(User::class);
    }

    // get the documents of the offer
    public function documents(){
        return $this->hasMany(Document::class);
    }

    /**
     * Get the task associated with the offer.
     */
    public function task()
    {
        return $this->hasOne(Task::class);
    }


    /**
     * CRUD
     * 
     * 
     */
    
    // creates an offer in database
    public function add($user, $data){
        return Offer::create([
            'user_id' => $user,
            'name' => $data['name'],
            'description' => $data['description']
        ]);
    }

    // edits an offer
    public function edit($id, $data){
        return Offer::where('id', $id)
                ->update([
                    'name' => $data['name'],
                    'description' => $data['description']
                ]);
    }

    // delete offer
    public function deleteOffer($id){
        return Offer::where('id', $id)
                ->delete();
    }


    // get user offers
    public function getOffers($user){
        return Offer::where('user_id', $user)->get();
    }
}

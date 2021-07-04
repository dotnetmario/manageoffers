<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
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

    // get the offer that owns the task
    public function offer(){
        return $this->belongsTo(User::class);
    }


    /**
     * CRUD
     * 
     * 
     */
    
    // creates an task in database
    public function add($offer, $data){
        return Task::create([
            'offer_id' => $offer,
            'name' => $data['name'],
            'description' => $data['description']
        ]);
    }

    // edits an task
    public function edit($id, $data){
        return Task::where('id', $id)
                ->update([
                    'name' => $data['name'],
                    'description' => $data['description']
                ]);
    }

    // delete task
    public function deleteTask($id){
        return Task::where('id', $id)
                ->delete();
    }

}

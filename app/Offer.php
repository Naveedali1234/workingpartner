<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $guarded = [];

    public function sender(){
    	return $this->belongsTo('App\User','sender_id');
    }
    public function reciever(){
    	return $this->belongsTo('App\User','reciever_id');
    }
}

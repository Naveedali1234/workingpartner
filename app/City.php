<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];
    public function province(){
    	return $this->belongsTo('App\Province');
    }
    public function country(){
    	return $this->belongsTo('App\Country');
    }
}

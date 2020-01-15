<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $guarded = [];
    public function provinces(){
    	return $this->hasMany('App\Province');
    }
    public function cities(){
    	return $this->hasMany('App\City');
    }
}

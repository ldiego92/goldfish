<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    public function book() {
		return $this->hasMany('App\Book');
	}
	
	    public function periodicPublication() {
		return $this->hasMany('App\PeriodicPublication');
	}
}

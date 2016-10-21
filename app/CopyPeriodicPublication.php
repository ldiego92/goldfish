<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CopyPeriodicPublication extends Model
{
    	    public function article() {
		return $this->hasMany('App\Article');
	}
	
		    public function loanable() {
		return $this->hasOne('App\Loanable');
	}
	
		    public function periodicPublication() {
		return $this->belongsTo('App\PeriodicPublication');
	}
}

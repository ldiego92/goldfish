<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudiovisualEquipment extends Model
{
    public function brand() {
		return $this->belongsTo('App\Brand');
	}
	
	    public function model() {
		return $this->belongsTo('App\Model');
	}
	    public function type() {
		return $this->belongsTo('App\Type');
	}
		    public function loanable() {
		return $this->hasOne('App\Loanable');
	}
}


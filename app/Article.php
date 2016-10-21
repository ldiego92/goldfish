<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function copyPeriodicPublication() {
		return $this->belongsTo('App\CopyPeriodicPublication');
	}
	
	    public function author() {
		return $this->belongsToMany('App\Autor');
	}
	
		    public function key_word() {
		return $this->belongsToMany('App\Key_word');
	}
}

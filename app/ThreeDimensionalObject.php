<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreeDimensionalObject extends Model
{
	public function loanable() {
		return $this->hasOne('App\Loanable');
	}
	
			 public function bibliographicMaterial() {
		return $this->hasOne('App\BibliographicMaterial');
	}
	
		    public function keyWord() {
		return $this->belongsToMany('App\KeyWord');
	}
}

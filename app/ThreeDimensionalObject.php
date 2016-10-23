<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreeDimensionalObject extends Model
{
<<<<<<< HEAD
    //
=======
        public function loanable() {
		return $this->hasOne('App\Loanable');
	}
	
			 public function bibliographicMaterial() {
		return $this->hasOne('App\BibliographicMaterial');
	}
	
		    public function keyWord() {
		return $this->belongsToMany('App\KeyWord');
	}
>>>>>>> 1e4c55027a08a1ba2659988d780ffb54639e7af1
}

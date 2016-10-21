<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudiovisualMaterial extends Model
{
<<<<<<< HEAD
    //
=======
    public function audiovisualFormat() {
		return $this->belongsTo('App\AudiovisualFormat');
	}
	
    public function audiovisualType() {
		return $this->belongsTo('App\AudiovisualType');
	}
	
	    public function keyWord() {
		return $this->belongsToMany('App\KeyWord');
	}
		public function loanable() {
		return $this->hasOne('App\Loanable');
	}
	
		public function bibliographicMaterial() {
		return $this->hasOne('App\BibliographicMaterial');
	}
>>>>>>> 1e4c55027a08a1ba2659988d780ffb54639e7af1
}

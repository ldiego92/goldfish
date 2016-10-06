<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudiovisualMaterial extends Model
{
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
}

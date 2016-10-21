<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BibliographicMaterial extends Model
{
 public function author() {
		return $this->belongsToMany('App\Author');
						}
  public function book() {
		return $this->hasOne('App\Book');
  }
  public function threeDimensionalObject() {
		return $this->hasOne('App\ThreeDimensionalObject');
  }
    public function cartographicMaterial() {
		return $this->hasOne('App\CartographicMaterial');
  }
  
     public function audiovisualMaterial() {
		return $this->hasOne('App\AudiovisualMaterial');
  }
						
		 public function loanable() {
		return $this->hasOne('App\Loanable');
	}
	
			 public function editorial() {
		return $this->belongsTo('App\Editorial');
	}
}

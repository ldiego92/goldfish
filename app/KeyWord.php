<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeyWord extends Model
{
        public function article() {
		return $this->belongsToMany('App\Article');
		}
		
		public function audiovisualMaterial() {
		return $this->belongsToMany('App\AudiovisualMaterial');
		}
		
		public function cartographicMaterial() {
		return $this->belongsToMany('App\CartographicMaterial');
		}
		
		public function threeDimensionalObject() {
		return $this->belongsToMany('App\ThreeDimensionalObject');
		}
}

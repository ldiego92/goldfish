<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudiovisualFormat extends Model
{
        public function audiovisualMaterial() {
		return $this->hasMany('AudiovisualMaterial');
	}
}

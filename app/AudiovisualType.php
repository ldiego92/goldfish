<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudiovisualType extends Model
{
    public function audiovisualMaterial() {
		return $this->hasMany('App\AudiovisualMaterial');
	}
}

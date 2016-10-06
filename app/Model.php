<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model extends Model
{
        public function audiovisualEquipment() {
		return $this->hasMany('AudiovisualEquipment');
	}
}

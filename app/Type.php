<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
        public function audiovisualEquipment() {
		return $this->hasMany('AudiovisualEquipment');
	}
}

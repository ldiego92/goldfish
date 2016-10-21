<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function audiovisualEquipment() {
		return $this->hasMany('AudiovisualEquipment');
	}
}
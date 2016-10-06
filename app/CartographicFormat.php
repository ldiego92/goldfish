<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartographicFormat extends Model
{
public function cartographicFormat() {
	return $this->hasMany('App\CartographicMaterial');
}
}

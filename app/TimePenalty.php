<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimePenalty extends Model
{
        public function penalty() {
		return $this->hasOne('App\Penalty');
	}
}

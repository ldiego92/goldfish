<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
        public function loanable() {
			return $this->belongsTo('App\Loanable');
		}
		
		public function penalty() {
		return $this->hasOne('App\Penalty');
		}
		
		public function user() {
		return $this->belongsTo('App\User');
		}
}

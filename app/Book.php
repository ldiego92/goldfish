<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   public function bibliographicMaterial() {
	   return $this->hasOne('App\BibliographicMaterial');
   }

}

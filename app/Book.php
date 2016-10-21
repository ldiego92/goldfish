<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
<<<<<<< HEAD
    //
=======
   public function bibliographicMaterial() {
	   return $this->hasOne('App\BibliographicMaterial');
   }

>>>>>>> 1e4c55027a08a1ba2659988d780ffb54639e7af1
}

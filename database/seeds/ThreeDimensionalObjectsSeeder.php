<?php

use Illuminate\Database\Seeder;
use App\ThreeDimensionalObject;

class ThreeDimensionalObjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 20; $i++) { 
	        ThreeDimensionalObject::create([
		        'physical_description'=> 'Descipción_fisica_'.$i,
		        'bibliographic_material_id'=> $i,
		    ]);
	    }
    }
}

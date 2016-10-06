<?php

use Illuminate\Database\Seeder;
use App\Model;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<20;$i++) {
			Model::create([
			'name'=>'Name_'.$i,			
			]);
		}
    }
}

<?php

use Illuminate\Database\Seeder;
use App\AudiovisualMaterial;

class AudiovisualMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20 ; $i++) { 
        	AudiovisualMaterial::create([
        		'loanable_id'=> $i,
        		'bibliographic_material_id' => $i,
        		'audiovisual_format_id' => $i,
        		'audivisual_material_type_id' => $i,
        		]);
        }
    }
}

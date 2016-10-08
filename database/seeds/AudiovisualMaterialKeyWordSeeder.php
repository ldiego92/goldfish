<?php

use Illuminate\Database\Seeder;
use App\AudiovisualMaterialKeyWord;

class AudiovisualMaterialKeyWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i < 20; $i++){
        	DB::table('AudiovisualMaterialKeyWord')->insert([
            'audiovisual_material_id' => $i+1,
            'key_word_id' => $i+1,
        ]);
        }
    }
}

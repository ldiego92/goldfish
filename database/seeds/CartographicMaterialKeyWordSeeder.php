<?php

use Illuminate\Database\Seeder;
use App\CartographicMaterialKeyWord;

class CartographicMaterialKeyWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      	for($i=0; $i<20;$i++) {
          DB::table('CartographicMaterialKeyWord')->insert([
            'key_word_id' => $i + 1,
            'cartographic_material_id' => $i + 1,
            ]);
        }
    }
}

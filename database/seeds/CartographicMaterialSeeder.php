<?php

use Illuminate\Database\Seeder;
use App\CartographicMaterial;

class CartographicMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20 ; $i++) { 
         CartographicMaterial::Create([
                'bibliographic_materials_id' => $i+1,
                'cartographic_format_id' => $i+1,
                'dimension' => 'Dimension_' . $i,
             	]);
        }
    }
}

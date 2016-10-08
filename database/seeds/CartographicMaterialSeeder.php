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
         CartographicMaterial::Create([
                'bibliographic_materials_id' => $i,
                'Cartographic_format_id' => $i,
                'dimension' => 'Garchar_' . $i,
             	]);
    }
}

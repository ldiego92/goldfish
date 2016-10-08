<?php

use Illuminate\Database\Seeder;
use App\ThreeDimensionalObjectKeyWord;

class ThreeDimensionalObjectKeyWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ThreeDimensionalObjectKeyWord')->insert([
        	'three_dimensional_object_id' => rand(1,20),
        	'key_word_id' => rand(1,20),
        	]);
    }
}

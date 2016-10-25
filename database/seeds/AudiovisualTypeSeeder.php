<?php

use Illuminate\Database\Seeder;
use App\AudiovisualType;
class AudiovisualTypeSeeder extends Seeder
{

    $names = ["Portatil", "Cable HMDI", "Cable VGA", "Proyector", "Regleta", "Parlante", "Extension", "TV", "Planta de sonido", "Microfono", "Tablet", "Aula", "Grabadora"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i < 20; $i++){
        	AudiovisualType::create([
                $name = $names[rand(0,count($names)-1)];
        		'name' => $name,
        		]);
        }
    }
}

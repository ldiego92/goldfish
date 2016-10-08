<?php

use Illuminate\Database\Seeder;
use App\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
        	'name' => 'Nombre_'.$i,
        	'email' => 'correo_'.$i.'@correo.com',
        	'password' => Hash::make('1234'),
        	'identity_card' => 'cedula_'.$i,
        	'last_name' => 'apellido_'.$i,
        	'brithday' => 2000 + $i .3 .$i,
        	'home_phone' => 'telefono_'.$i,
        	'cell_phone' => 'celular_'.$i,
        	'next_update_time' => 2010 .4 .$i,
        	'active' => 'true',
        	'role_id' => $i,
        }
    }
}

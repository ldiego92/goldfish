<?php

use Illuminate\Database\Seeder;
use Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20 ; $i++) { 
        	Role::create([
        		'type' => 'Role_'.$i,
        	]);
        }
    }
}

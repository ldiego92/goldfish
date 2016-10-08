<?php

use Illuminate\Database\Seeder;
use App\Student; 

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<20;$i++) {
             Student::Create([
                'license' => $i,
                'user_Id' => $i + 1,
             	]);
        }
    }
}

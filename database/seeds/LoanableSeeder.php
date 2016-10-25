<?php

use Illuminate\Database\Seeder;
use App\Loanable;

class LoanableSeeder extends Seeder
{
    $notes = [" ", "Esta dañado", " ", "Perdo el color", "Contiene moho", 'Equipo nuevo'];
    $states
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Loanable::Create([
        'barcode' => "AU1510",
        'note' => 'Equipo nuevo',
        'state_id' => 1,
        'loan_category_id' =>  1,
        ]);
       for($i=1; $i<20;$i++) {
             Loanable::Create([
                $note = $notes[rand(0,count($notes)-1)];
                'barcode' => "AU18".$i * 3,
                'note' => $note,
                'state_id' => rand(1,4),
                'loan_category_id' => $i + 1,
             	]);
         }
    }
}

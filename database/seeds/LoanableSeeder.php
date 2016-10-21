<?php

use Illuminate\Database\Seeder;
use App\Loanable;

class LoanableSeeder extends Seeder
{
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
                'barcode' => $i,
                'note' => 'Nota_' . $i,
                'state_id' => 1,
                'loan_category_id' => $i + 1,
             	]);
         }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Book::Create([
                'loanable_id' => $i,
                'bibliographic_materials_id' => $i,
             	]);
    }
}

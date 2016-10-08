<?php

use Illuminate\Database\Seeder;
use App\ArticleKeyWord;

class ArticleKeyWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ArticleKeyWord')->insert([
        	'article_id'=> rand(1,20),
        	'key_word_id'=> rand(1,20),
        	]);
    }
}

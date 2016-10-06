<?php

use Illuminate\Database\Seeder;
use App\ArticleAuthor;
class ArticleAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i=0; $i<20;$i++) {
          DB::table('ArticleAuthor')->insert([
            'article_id' => $i,
            'author_id' => $i,
            ]);
        }
    }
}

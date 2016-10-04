<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleKeyWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_key_words', function (Blueprint $table) {
            $table->integer('article_id')->unsigned();
			$table->integer('key_word_id')->unsigned();
			
			$table->primary(['article_id','key_word_id']);
			$table->foreign('article_id')->references('id')->on('articles');
			$table->foreign('key_word_id')->references('id')->on('key_words');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('article_key_words');
    }
}

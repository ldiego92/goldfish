<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
             $table->increments('id');
            $table->string('title');
            $table->integer('begin_page');
            $table->integer('end_page');
            $table->integer('copy_periodic_publication_id')->unsigned();
            $table->timestamps();

            $table->foreign('copy_periodic_publication_id')->references('id')->on('copy_periodic_publications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}

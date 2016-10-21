<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreeDimensionalObjectKeyWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('three_dimensional_object_key_words', function (Blueprint $table) {
            $table->integer('three_dimensional_object_id')->unsigned();
            $table->integer('key_word_id')->unsigned();

            $table->primary(['three_dimensional_object_id', 'key_word_id'], 'tdo_kw_pk');
            $table->foreign('three_dimensional_object_id','tdo_fk')->references('id')->on('three_dimensional_objects');
            $table->foreign('key_word_id','kwo_fk')->references('id')->on('key_words');
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
        Schema::drop('three_dimensional_object_key_words');
    }
}

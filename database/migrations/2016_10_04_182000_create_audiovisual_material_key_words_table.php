<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudiovisualMaterialKeyWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audiovisual_material_key_words', function (Blueprint $table) {
            $table->integer('audiovisual_material_id')->unsigned();
            $table->integer('key_word_id')->unsigned();

            $table->primary(['audiovisual_material_id', 'key_word_id'], 'au_kw_pk');
            $table->foreign('audiovisual_material_id')->references('id')->on('audiovisual_materials');
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
        Schema::drop('audiovisual_material_key_words');
    }
}

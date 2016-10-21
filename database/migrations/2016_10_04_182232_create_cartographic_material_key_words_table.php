<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartographicMaterialKeyWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartographic_material_key_words', function (Blueprint $table) {
            $table->integer('key_word_id')->unsigned();
            $table->integer('cartographic_material_id')->unsigned();

            $table->primary(['key_word_id', 'cartographic_material_id'], 'kw_cm_pk');
            $table->foreign('key_word_id','kw_fk')->references('id')->on('key_words');
            $table->foreign('cartographic_material_id','cm_fk')->references('id')->on('cartographic_materials');
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
        Schema::drop('cartographic_material_key_words');
    }
}

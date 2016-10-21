<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibliographicMaterialAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliographic_material_authors', function (Blueprint $table) {
            $table->integer('bibliographic_material_id')->unsigned();
            $table->integer('author_id')->unsigned();

            $table->primary(['bibliographic_material_id', 'author_id'], 'bm_author_pk');
            $table->foreign('bibliographic_material_id')->references('id')->on('bibliographic_materials');
            $table->foreign('author_id')->references('id')->on('authors');
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
        Schema::drop('bibliographic_material_authors');
    }
}

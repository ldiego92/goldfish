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
            $table->int('bibliographic_material_id')->unsigned();
            $table->int('author_id')->unsigned();

            $table->primary(['bibliographic_material_id', 'author_key']);
            $table->foreign('bibliographic_material_id')->refence('id')->on('bibliographic_materials');
            $table->foreign('author_id')->refence('id')->on('authors');
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

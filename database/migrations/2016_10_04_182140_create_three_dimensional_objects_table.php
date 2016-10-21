<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreeDimensionalObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('three_dimensional_objects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('physical_description');
            $table->integer('bibliographic_material_id')->unsigned();
            $table->timestamps();

            $table->foreign('bibliographic_material_id')->references('id')->on('bibliographic_materials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('three_dimensional_objects');
    }
}

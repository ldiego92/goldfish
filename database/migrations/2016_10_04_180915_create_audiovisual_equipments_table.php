<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudiovisualEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audiovisual_equipments', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('brand_id')->unsigned();
			$table->integer('model_id')->unsigned();
			$table->integer('type_id')->unsigned();
			$table->integer('loanable_id')->unsigned();
			$table->timestamps();
			
			$table->foreing('brand_id_id')->references('id')->on('brands');
			$table->foreing('model_id')->references('id')->on('models');
			$table->foreing('type_id')->references('id')->on('Types');
			$table->foreing('loanable_id')->references('id')->on('loanables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('audiovisual_equipments');
    }
}

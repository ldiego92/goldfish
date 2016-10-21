<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD:database/migrations/2016_10_04_011421_create_models_table.php
            $table->integer('identity_card');
            $table->string('name');
			$table->timestamps();
=======
			$table->string('name');
            $table->timestamps();
>>>>>>> 1e4c55027a08a1ba2659988d780ffb54639e7af1:database/migrations/2016_10_04_180516_create_models_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('models');
    }
}

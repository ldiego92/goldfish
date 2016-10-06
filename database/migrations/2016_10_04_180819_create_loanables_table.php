<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loanables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barcode');
            $table->string('note');
            $table->integer('state_id')->unsigned();
            $table->timestamps();

            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('loanables');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Irregulartask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('irregulartask', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idColumn')->unsigned();
            $table->foreign('idColumn')->references('id')->on('columns');
            $table->integer('idEmployee')->unsigned();
            $table->foreign('idEmployee')->references('id')->on('employees');
            $table->integer('idStage')->unsigned();
            $table->foreign('idStage')->references('id')->on('stage');
            $table->dateTime('start');
            $table->dateTime('finish');
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
        //
        Schema::dropIfExists('irregulartask');

    }
}

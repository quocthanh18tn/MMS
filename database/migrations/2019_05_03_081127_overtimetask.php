<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Overtimetask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('overtimetask', function (Blueprint $table) {
             $table->increments('id');
            $table->integer('idColumn')->unsigned();
            $table->foreign('idColumn')->references('id')->on('columns')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('idStage')->unsigned();
            $table->foreign('idStage')->references('id')->on('stage')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('start')->nullable();
            $table->dateTime('finish')->nullable();
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
        Schema::dropIfExists('overtimetask');

    }
}

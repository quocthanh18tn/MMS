<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductionMain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('production_main', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idColumn')->unsigned();
            $table->foreign('idColumn')->references('id')->on('columns');

            $table->integer('idEmployee')->unsigned();
            $table->foreign('idEmployee')->references('id')->on('employees');
            $table->integer('idStage')->unsigned();
            $table->foreign('idStage')->references('id')->on('stage');

            $table->dateTime('start');
            $table->dateTime('finish');
            $table->integer('expectTime');
            $table->dateTime('finishtemp');
            $table->string('QC');
            $table->string('Manager');
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
        Schema::dropIfExists('production_main');

    }
}

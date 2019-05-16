<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductionMaybenddong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('production_maybenddong', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEmployee')->unsigned();
            $table->foreign('idEmployee')->references('id')->on('employees');
            $table->string('idBusbar');
            $table->dateTime('start');

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
        Schema::dropIfExists('production_maybenddong');

    }
}

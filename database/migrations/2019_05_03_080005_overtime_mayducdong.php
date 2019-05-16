<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OvertimeMayducdong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('overtime_mayducdong', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('idEmployee')->unsigned();
            $table->foreign('idEmployee')->references('id')->on('employees');
            $table->string('idBusbar');
            $table->dateTime('overtime_start');
            $table->dateTime('overtime_finish');
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
        Schema::dropIfExists('overtime_mayducdong');

    }
}

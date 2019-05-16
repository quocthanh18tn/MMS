<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PauseMayducdong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('pause_mayducdong', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEmployee')->unsigned();
            $table->foreign('idEmployee')->references('id')->on('employees');
            $table->string('idBusbar');
            $table->dateTime('pause');
            $table->dateTime('resume');
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
        Schema::dropIfExists('pause_mayducdong');

    }
}

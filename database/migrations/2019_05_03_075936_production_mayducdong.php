<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductionMayducdong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('production_mayducdong', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEmployee')->unsigned();
            $table->foreign('idEmployee')->references('id')->on('employees');
            
            $table->string('idBusbar');
            $table->dateTime('start');
            $table->dateTime('finish');
            $table->string('NoBar'); // number of bar
            $table->string('NoHole'); //number of hole

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
        Schema::dropIfExists('production_mayducdong');

    }
}

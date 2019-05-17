<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductionLosay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('production_losay', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idLosay');

            $table->dateTime('start')->nullable();
            $table->dateTime('finish')->nullable();
            $table->dateTime('finishtemp')->nullable();
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
        Schema::dropIfExists('production_losay');

    }
}

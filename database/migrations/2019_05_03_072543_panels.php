<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Panels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //.
        Schema::create('panels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idPanel')->unique();
            $table->integer('idProject')->unsigned();
            $table->foreign('idProject')->references('id')->on('projects');
            $table->string('name');
            $table->date('expectFat')->nullable();
            $table->date('expectDelivery')->nullable();
            $table->date('adjustFat')->nullable();
            $table->date('adjustDelivery')->nullable();
            $table->date('Delivery')->nullable();
            $table->integer('idPaneltype')->unsigned()->nullable();
            $table->foreign('idPaneltype')->references('id')->on('paneltype');
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
        Schema::dropIfExists('panels');

    }
}

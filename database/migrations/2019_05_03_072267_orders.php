<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //order table don hang
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idOrder');
            $table->integer('idProject')->unsigned();
            $table->foreign('idProject')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('idCustomer')->unsigned();
            $table->foreign('idCustomer')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('orders');

    }
}

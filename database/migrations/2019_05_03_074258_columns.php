<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Columns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('columns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idColumn')->unique();
            $table->string('name')->nullable();

            $table->integer('idPanel')->unsigned();
            $table->foreign('idPanel')->references('id')->on('panels')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('columns');

    }
}

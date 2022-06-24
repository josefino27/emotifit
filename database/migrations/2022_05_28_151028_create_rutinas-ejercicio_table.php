<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutinas-ejercicio',function(Blueprint $table){
            $table->increments('id-rutina-ejercicio');
            $table->integer('id-rutina')->unsigned();
            $table->integer('id-ejercicio')->unsigned();
            $table->integer('intervalo-descanso');
            $table->foreign('id-rutina')->references('id-rutina')->on('rutinas');
            $table->foreign('id-ejercicio')->references('id-ejercicio')->on('ejercicios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutinas-ejercicio');
    }
};

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
        Schema::create('rutinas_ejercicios',function(Blueprint $table){
            $table->increments('id_rutina_ejercicio');
            $table->integer('id_rutina')->unsigned();
            $table->integer('id_ejercicio')->unsigned();
            $table->integer('serie_tipo')->unsigned();
            $table->integer('repeticiones')->nullable();
            $table->integer('duracion_segundos')->nullable();
            $table->foreign('serie_tipo')->references('id_serie')->on('series');
            $table->foreign('id_rutina')->references('id_rutina')->on('rutinas');
            $table->foreign('id_ejercicio')->references('id_ejercicio')->on('ejercicios');
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
        Schema::dropIfExists('rutinas_ejercicios');
    }
};

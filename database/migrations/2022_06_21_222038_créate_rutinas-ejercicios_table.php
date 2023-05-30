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
        Schema::create('rutinas_ejercicio',function(Blueprint $table){
            $table->increments('id_rutina_ejercicio');
            $table->integer('id_rutina')->unsigned();
            $table->integer('id_ejercicio')->unsigned();
            $table->integer('intervalo_descanso');
            $table->foreign('id_rutina')->references('id_rutina')->on('rutinas');
            $table->foreign('id_ejercicio')->references('id_ejercicio')->on('ejercicios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutinas_ejercicio');
    }
};

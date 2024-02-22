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
        Schema::create('rutina_ejerciciox_user', function (Blueprint $table) {
            $table->increments('id_rutinaEjercicioxUser');
            $table->integer('id_rutina_ejercicio')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_rutina_ejercicio')->references('id_rutina_ejercicio')->on('rutinas_ejercicios');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->Date('fecha');
            $table->time('comienza');
            $table->time('termina');
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
        Schema::dropIfExists('rutina_ejerciciox_user');
    }
};

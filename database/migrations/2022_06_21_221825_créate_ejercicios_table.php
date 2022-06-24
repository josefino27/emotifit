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
        Schema::create('ejercicios', function (Blueprint $table) {
            $table->increments('id_ejercicio');
            $table->string('nombre_ejercicio');
            $table->string('descripcion');
            $table->integer('id_musculo')->unsigned();
            $table->string('imagen_ejercicio');
            $table->foreign('id_musculo')->references('id')->on('musculos');
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
        Schema::dropIfExists('ejercicios'); 
    }
};

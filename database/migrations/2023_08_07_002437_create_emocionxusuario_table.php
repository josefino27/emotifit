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
        Schema::create('emocionxusuario', function (Blueprint $table) {
            $table->increments('id_emocionxusuario');
            $table->integer('id_emocion')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_emocion')->references('id_emocion')->on('emocion');
            $table->foreign('id_usuario')->references('id')->on('users');
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
        Schema::dropIfExists('emocionxusuario');
    }
};

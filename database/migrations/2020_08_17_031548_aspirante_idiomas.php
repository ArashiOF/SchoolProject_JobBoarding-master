<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AspiranteIdiomas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('aspirante_idiomas', function (Blueprint $table) {
          $table->bigIncrements('id');

          $table->bigInteger ('userid')->unsigned();
          $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');

          $table->string('idioma');
          $table->integer('escrito');
          $table->integer('hablado');
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
        Schema::dropIfExists('aspirante_idiomas');
    }
}

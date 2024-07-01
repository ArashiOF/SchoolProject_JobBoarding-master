<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearVacanteConcimineto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vacante_conocimientos', function (Blueprint $table) {
          $table->bigInteger ('vacanteId')->unsigned();
          $table->foreign('vacanteId')->references('id')->on('vacantes')->onDelete('cascade');

          $table->bigInteger ('conocimientoId')->unsigned();
          $table->foreign('conocimientoId')->references('id')->on('conocimientos')->onDelete('cascade');
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
        Schema::dropIfExists('vacante_conciminetos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearVacanteHabilidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vacante_habilidades', function (Blueprint $table) {
          $table->bigInteger ('vacanteId')->unsigned();
          $table->foreign('vacanteId')->references('id')->on('vacantes')->onDelete('cascade');

          $table->bigInteger ('habilidadId')->unsigned();
          $table->foreign('habilidadId')->references('id')->on('habilidades')->onDelete('cascade');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearAspiranteHabilidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('aspirante_habilidades', function (Blueprint $table) {
          $table->bigInteger ('userid')->unsigned();
          $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('aspirante_habilidades');
    }
}

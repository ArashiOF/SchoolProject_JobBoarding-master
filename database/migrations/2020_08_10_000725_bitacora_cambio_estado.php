<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BitacoraCambioEstado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bitacora_aspVac_estados', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger ('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');

            $table->string('carrera');
            $table->string('estadoAnterior');
            $table->string('estadoCambiado');

            $table->timestamp('tiempoAnterior')->useCurrent = true;
            $table->timestamp('tiempoCambiado')->useCurrent = true;

            $table->bigInteger('diffMes');
            $table->bigInteger('diffDia');
            $table->bigInteger('diffHora');

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
        Schema::dropIfExists('bitacora_aspVac_estado');
    }
}

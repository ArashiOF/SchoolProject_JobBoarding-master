<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableAspirante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspirantes', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            //$table->string('nombre');
            //$table->string('apellidoPaterno');
            //$table->string('apellidoMaterno');
            //$table->char('genero');
            $table->string('direccion');
            //$table->string('calle');
            //$table->string('colonia');
            //$table->string('ciudad');
            //$table->string('estado');
            //$table->string('correo');
            // $table->string('contacto');
            $table->string('licenciatura'); //carrera que va
            $table->string('estadoLic'); //egresado, en curso
            $table->integer('inglesEscrito'); //0:basico 1:intermedio 2:Avanzado
            $table->integer('inglesHablado'); //0:basico 1:intermedio 2:Avanzado
            $table->string('dispViaje'); //si o no
            $table->string('dispReubicar'); //si o no
            $table->integer('numeroExp')->nullable();
            $table->string('tiempoExp')->nullable();
            $table->string('areaLaboral')->nullable();
            $table->string('curriculum')->nullable();
            $table->bigInteger ('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('aspirantes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('tipoUsuario')->nullable(); //0:aspirante o 1:empresa
            $table->string('contacto')->nullable();
            $table->bigInteger('nivel')->nullable();
            $table->bigInteger('experiencia')->nullable();
            $table->remembertoken();
            $table->timestamps();

            /*
            Datos nuevos de usuario
            Estudiante

            $table->string('ocupacion');
            $table->string('carrera');
            $table->boolean('graduado');
            $table->string('telefono');
            $table->string('celular');
            $table->string('direccion');
            $table->string('habilidades');




            Empleado


            */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

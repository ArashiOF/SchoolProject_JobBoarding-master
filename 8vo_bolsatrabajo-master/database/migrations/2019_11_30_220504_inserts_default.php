<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertsDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert(
            [
               [ 'id' => 1,
                'name' => 'admin',
                'email' => 'admin@uabc.com',
                'email_verified_at' => '2020-08-17 04:31:52',
                'password' => '$2y$10$AnjECCIk7ujaRP4i/fKqSeQVIwbvwht13.m8TxQ4Q1apLENe0W5tq',
                'contacto' => '(664)111-2222',
                'remember_token' => NULL,
                'created_at' => '2019-05-26 01:05:06',
                'updated_at' => '2019-05-26 01:05:06',
                'tipoUsuario' => '2'],

                [ 'id' => 2,
                'name' => 'marisa',
                'email' => 'marisa@uabc.com',
                'email_verified_at' => null,
                'password' => '$2y$10$vYWNDXcwtu6Rtg/b9dhuK.ZqTbqdDlAO21rpgp4vH9ApHOX6eIDMq',
                'contacto' => '(664)111-2222',
                'remember_token' => NULL,
                'created_at' => '2019-05-26 01:10:45',
                'updated_at' => '2019-05-26 01:10:45',
                'tipoUsuario' => '1']
            ]
        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

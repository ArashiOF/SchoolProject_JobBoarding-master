<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bitacorarespuesta extends Model
{
    //
    protected $primaryKey = 'idbitacorarespuestas';
    protected $table = 'bitacorarespuestas';
    protected $attributes = [
    'respuestacorrecta' => 0,
    'respuestaabierta' => null
    ];
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class CrearCuestionarioSimpleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::find(3);

        $response = $this->actingAs($user)
                        ->call('POST', '/encuestaNueva', ['_token' => '41kUxjSG21EYiAO2fusMijpA7Pqb8jzj2ytxagPb', 'titulo' => 'Prueebaaa automatica', 'idcategoria' => '1', 'publico' => true, 'almacenarrespuestas' => true]);        
        $response->assertStatus(200);


        $response = $this->actingAs($user)
                         ->get('/');

        $response->assertSeeText('Prueebaaa automatica');
    }
}

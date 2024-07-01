<?php

namespace Tests\Feature;

use Tests\TestCase;

class Prueba1Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/register');
        $response->assertSeeText('O registra tus datos');

    }
}

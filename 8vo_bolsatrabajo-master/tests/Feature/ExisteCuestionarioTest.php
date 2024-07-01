<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class ExisteCuestionarioTest extends TestCase
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
                         ->get('/');

        $response->assertSeeText('arcoiris');
    }
}

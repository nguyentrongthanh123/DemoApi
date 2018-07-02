<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetLogOutTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogout()
    {
        $this->json('GET', '/api/get-logout')
            ->assertStatus(200)
            ->assertJson([
                'message' => "Page login",
                'status'  => true
            ]);
    }
}

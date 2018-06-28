<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class postRegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('POST', '/api/postRegister', [
            'name'        => 'thanhtest',
            'email'       => 'thanhtest@gmail.com',
            'password'    => '123456',
            're_password' => '123456'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 201,
                'error' => true
            ]);
    }
}

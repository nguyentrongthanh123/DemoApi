<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostLoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->json('POST', '/api/post-login', [
            'email'       => 'thanh@gmail.com',
            'password'    => '123456',
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
                'message' => "User Verified"
            ]);
    }

    public function testRequiredLogin()
    {
        $response = $this->json('POST', '/api/post-login', [
            'email'       => '',
            'password'    => '',
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => "Error while validating user",
                'status'  => false
            ])
            ->assertJsonValidationErrors([  
                'email' ,
                'password' 
            ]);
    }
}

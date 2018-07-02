<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostRegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegister()
    {
        // $response = $this->json('POST', '/api/post-register', [
        //     'name'        => 'thanhtest',
        //     'email'       => 'thanhres4@gmail.com',
        //     'password'    => '123456',
        //     're_password' => '123456'
        // ]);
        // $response
        //     ->assertStatus(200)
        //     ->assertJson([
        //         'status' => 201,
        //         'message' => "All results fetched",
                
        //         ])->assertJsonStructure([
        //             'data' =>[
        //                 'id',
        //                 'name',
        //                 'email',
        //                 'created_at',
        //                 'updated_at',
        //             ]
        //         ]);

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testRequired()
    {
        $response = $this->json('POST', '/api/post-register', [
            'name'        => '',
            'email'       => '',
            'password'    => '',
            're_password' => ''
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => "Error while validating user",
                'status'  => false
            ])
            ->assertJsonValidationErrors([  
                'name' ,
                'email' ,
                'password' 
            ]);
    }
}

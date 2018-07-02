<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PutEditUser extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPutEditUser()
    {
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU3ZDczYTNmYjRkYjM5ODIxMzZlMDFmNzZhYTQwZTdmMzg2MWMyZWE2MjlkZjM0M2I5MjI5MTkyZDdhMWM5Mjc1NjM4MGM4ODMyZTBmNWNmIn0.eyJhdWQiOiIyIiwianRpIjoiZTdkNzNhM2ZiNGRiMzk4MjEzNmUwMWY3NmFhNDBlN2YzODYxYzJlYTYyOWRmMzQzYjkyMjkxOTJkN2ExYzkyNzU2MzgwYzg4MzJlMGY1Y2YiLCJpYXQiOjE1MzAyNjY4NzIsIm5iZiI6MTUzMDI2Njg3MiwiZXhwIjoxNTMxNTYyODcyLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.Mqsvlq_mMWGYrDsD-w1QPi1ZnVEefLHzXnOWTkNEf8BuWZXHMlzz4PPaQ_ARY_FiFAngng6KKirU0CGNmX2wtBQHlRjvCAUBn-TV-TqaxhMAkdnDhXxzDWvs1_9833eJodrbVSJq4Zt9N5GCXLnGz5Q_uhm1Hrrs693IEWyvfy_0NNeaTSDrkXiq8jkM3DjEEWietaz8bFONUUJczeOZ91fHRdTf6p4bQDTh-itxVe4kZc0EDkFhctxZDLLEGOOW8PEjdnX0Dl8Na92oLYjPupnpwJ7Xw2e38-WGcLNWCN7Dil0GIjswaZLzfvlZZl8t9loN43KckBQqmOaxejtycb3YMFA6ZwUPw03cUrY7u3vBKHk6jc7lQ0Dt5izNYU8ka5p81YqvlmjvZFB2Iagk6Iu3B0Q5gDboHr8gtO3QiOsoG8rkiC69DAYDaWSMqXHONJj0-9Rem34yhfQ8U2uNgBMm5zPnl65Lbxy1wHBuENtde2i_uxMrtKqles5RQoMbYMm7TTEMPL3oCk25Dxp0eSzG7l-3JHd9DL6VSQDk_s51oocMCgWd-WtzCvAk9vjYoVqSFlQ9PKp_b92XZezJUnM_UDCN5BWEI0CEoyV3K5gOT4o624PSoSPNZVpM5mTsTqZAlvNhIes0AHsNFD1dmVVCOCb8Fn1SWgKq0GjYXV0";
        $headers = ['Authorization' => "Bearer $token"];

        $this->json('GET', '/api/get-user', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                'message' => "Edit success",
                'status'  => true
            ]);
    }

    public function testNoneToken()
    {
        $token = "";
        $headers = ['Authorization' => "Bearer $token"];
        $id = "1";
        $this->json('GET', '/api/get-user-by-id/'.$id, [], $headers)
            ->assertStatus(401);
    }

    public function testIdIncorrect()
    {
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU3ZDczYTNmYjRkYjM5ODIxMzZlMDFmNzZhYTQwZTdmMzg2MWMyZWE2MjlkZjM0M2I5MjI5MTkyZDdhMWM5Mjc1NjM4MGM4ODMyZTBmNWNmIn0.eyJhdWQiOiIyIiwianRpIjoiZTdkNzNhM2ZiNGRiMzk4MjEzNmUwMWY3NmFhNDBlN2YzODYxYzJlYTYyOWRmMzQzYjkyMjkxOTJkN2ExYzkyNzU2MzgwYzg4MzJlMGY1Y2YiLCJpYXQiOjE1MzAyNjY4NzIsIm5iZiI6MTUzMDI2Njg3MiwiZXhwIjoxNTMxNTYyODcyLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.Mqsvlq_mMWGYrDsD-w1QPi1ZnVEefLHzXnOWTkNEf8BuWZXHMlzz4PPaQ_ARY_FiFAngng6KKirU0CGNmX2wtBQHlRjvCAUBn-TV-TqaxhMAkdnDhXxzDWvs1_9833eJodrbVSJq4Zt9N5GCXLnGz5Q_uhm1Hrrs693IEWyvfy_0NNeaTSDrkXiq8jkM3DjEEWietaz8bFONUUJczeOZ91fHRdTf6p4bQDTh-itxVe4kZc0EDkFhctxZDLLEGOOW8PEjdnX0Dl8Na92oLYjPupnpwJ7Xw2e38-WGcLNWCN7Dil0GIjswaZLzfvlZZl8t9loN43KckBQqmOaxejtycb3YMFA6ZwUPw03cUrY7u3vBKHk6jc7lQ0Dt5izNYU8ka5p81YqvlmjvZFB2Iagk6Iu3B0Q5gDboHr8gtO3QiOsoG8rkiC69DAYDaWSMqXHONJj0-9Rem34yhfQ8U2uNgBMm5zPnl65Lbxy1wHBuENtde2i_uxMrtKqles5RQoMbYMm7TTEMPL3oCk25Dxp0eSzG7l-3JHd9DL6VSQDk_s51oocMCgWd-WtzCvAk9vjYoVqSFlQ9PKp_b92XZezJUnM_UDCN5BWEI0CEoyV3K5gOT4o624PSoSPNZVpM5mTsTqZAlvNhIes0AHsNFD1dmVVCOCb8Fn1SWgKq0GjYXV0";
        $headers = ['Authorization' => "Bearer $token"];
        $id = "";
        $this->json('GET', '/api/get-user-by-id/'.$id, [], $headers)
            ->assertStatus(404);
    }

    
    
}

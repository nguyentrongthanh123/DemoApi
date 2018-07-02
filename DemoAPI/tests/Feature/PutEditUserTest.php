<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PutEditUserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPutEditUser()
    {
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjllOWYyYWNmZTc5YzYxZjc1ZGVlN2Q2OWRlYjE5NmU0YzViNmExYjI3NzQ2YmU4ZWNmNjE5NDNiMmJlN2NiODUxMGJhZDlhNmRlZDZkNmY0In0.eyJhdWQiOiIxIiwianRpIjoiOWU5ZjJhY2ZlNzljNjFmNzVkZWU3ZDY5ZGViMTk2ZTRjNWI2YTFiMjc3NDZiZThlY2Y2MTk0M2IyYmU3Y2I4NTEwYmFkOWE2ZGVkNmQ2ZjQiLCJpYXQiOjE1MzA1MDgzMTMsIm5iZiI6MTUzMDUwODMxMywiZXhwIjoxNTMxODA0MzEzLCJzdWIiOiIzNCIsInNjb3BlcyI6WyJhZG1pblN1Y2Nlc3MiXX0.ZRRiqwg7UL7F3vfwNbhCcL1sExKEHZGCZg-TUF5YbacuP0U25wwO9yD2VZbG7NTnYzBK5Bm8Le4YMqrR0NdEOUToxkq-G0CQbMVSHN-A_GJEs1EbNEck6Dh3V59dG5Uo5MRbEEJ2aclPy_QXeliR1dS0VK-08LhT3tWf2JfGrH91mJ6EBpafxB6wFjw2kamVl8djwP4LpkZX28LrGBiJnFGPnQMrfQ3rp0Ldmwu4EoP4SpluKCG5J4hGLN-1cW5kjc-be49-N3hCrM2iSLUWACG5uPd9hnbqEusHOxt-nsGWURK-8fWXepaZ2qh_cif9LNbMNlqOqVXJ6zUEe8lVVp2nfoU5Jjaifw23nprXg6cYI_k23CwPiGi8enrzZNXu62eQvkWSoJ5fSIW0b7iKCqWijtqfDLhdnP-wCUF3VkBCBMbe-m1xMNZVPTIfpfUqWJEnfDLQZc_Md1zyVUhdK055ekm-tXoHaydxmr7ry5ZxGGm2jR0QkGF2lsxZ4nMHOfzP_FoAqu68e2AgMPochhfDnsO-ZMWjF38QZq8_tk0ocqpBh3N-KsjeZjFF-I9Jv-Xdy5tLu3lDCCTgPqfZSErdG3JszcGY4uXboVEG-5MhHODbO9g-a_yt0g5eu0BJSbYV-Nv3-QKh6eb2eZZGzbJGwf7aia5iDVbjovMR3sY";
        $headers = ['Authorization' => "Bearer $token"];
        $id = "1";
        $this->json('PUT', '/api/edit-user/'.$id, [], $headers)
            ->assertStatus(200)
            ->assertJson([
                'message' => "Edit success",
                'status'  => true
            ]);
    }

    public function testNoneTokenEditUser()
    {
        $token = "";
        $headers = ['Authorization' => "Bearer $token"];
        $id = "1";
        $this->json('PUT', '/api/edit-user/'.$id, [], $headers)
            ->assertStatus(401);
    }

    public function testIdIncorrectEditUser()
    {
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU3ZDczYTNmYjRkYjM5ODIxMzZlMDFmNzZhYTQwZTdmMzg2MWMyZWE2MjlkZjM0M2I5MjI5MTkyZDdhMWM5Mjc1NjM4MGM4ODMyZTBmNWNmIn0.eyJhdWQiOiIyIiwianRpIjoiZTdkNzNhM2ZiNGRiMzk4MjEzNmUwMWY3NmFhNDBlN2YzODYxYzJlYTYyOWRmMzQzYjkyMjkxOTJkN2ExYzkyNzU2MzgwYzg4MzJlMGY1Y2YiLCJpYXQiOjE1MzAyNjY4NzIsIm5iZiI6MTUzMDI2Njg3MiwiZXhwIjoxNTMxNTYyODcyLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.Mqsvlq_mMWGYrDsD-w1QPi1ZnVEefLHzXnOWTkNEf8BuWZXHMlzz4PPaQ_ARY_FiFAngng6KKirU0CGNmX2wtBQHlRjvCAUBn-TV-TqaxhMAkdnDhXxzDWvs1_9833eJodrbVSJq4Zt9N5GCXLnGz5Q_uhm1Hrrs693IEWyvfy_0NNeaTSDrkXiq8jkM3DjEEWietaz8bFONUUJczeOZ91fHRdTf6p4bQDTh-itxVe4kZc0EDkFhctxZDLLEGOOW8PEjdnX0Dl8Na92oLYjPupnpwJ7Xw2e38-WGcLNWCN7Dil0GIjswaZLzfvlZZl8t9loN43KckBQqmOaxejtycb3YMFA6ZwUPw03cUrY7u3vBKHk6jc7lQ0Dt5izNYU8ka5p81YqvlmjvZFB2Iagk6Iu3B0Q5gDboHr8gtO3QiOsoG8rkiC69DAYDaWSMqXHONJj0-9Rem34yhfQ8U2uNgBMm5zPnl65Lbxy1wHBuENtde2i_uxMrtKqles5RQoMbYMm7TTEMPL3oCk25Dxp0eSzG7l-3JHd9DL6VSQDk_s51oocMCgWd-WtzCvAk9vjYoVqSFlQ9PKp_b92XZezJUnM_UDCN5BWEI0CEoyV3K5gOT4o624PSoSPNZVpM5mTsTqZAlvNhIes0AHsNFD1dmVVCOCb8Fn1SWgKq0GjYXV0";
        $headers = ['Authorization' => "Bearer $token"];
        $id = "";
        $this->json('PUT', '/api/edit-user/'.$id, [], $headers)
            ->assertStatus(404);
    }

}

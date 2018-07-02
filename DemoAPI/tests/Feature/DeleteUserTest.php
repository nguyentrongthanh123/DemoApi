<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteUserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDelUser()
    {
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjllOWYyYWNmZTc5YzYxZjc1ZGVlN2Q2OWRlYjE5NmU0YzViNmExYjI3NzQ2YmU4ZWNmNjE5NDNiMmJlN2NiODUxMGJhZDlhNmRlZDZkNmY0In0.eyJhdWQiOiIxIiwianRpIjoiOWU5ZjJhY2ZlNzljNjFmNzVkZWU3ZDY5ZGViMTk2ZTRjNWI2YTFiMjc3NDZiZThlY2Y2MTk0M2IyYmU3Y2I4NTEwYmFkOWE2ZGVkNmQ2ZjQiLCJpYXQiOjE1MzA1MDgzMTMsIm5iZiI6MTUzMDUwODMxMywiZXhwIjoxNTMxODA0MzEzLCJzdWIiOiIzNCIsInNjb3BlcyI6WyJhZG1pblN1Y2Nlc3MiXX0.ZRRiqwg7UL7F3vfwNbhCcL1sExKEHZGCZg-TUF5YbacuP0U25wwO9yD2VZbG7NTnYzBK5Bm8Le4YMqrR0NdEOUToxkq-G0CQbMVSHN-A_GJEs1EbNEck6Dh3V59dG5Uo5MRbEEJ2aclPy_QXeliR1dS0VK-08LhT3tWf2JfGrH91mJ6EBpafxB6wFjw2kamVl8djwP4LpkZX28LrGBiJnFGPnQMrfQ3rp0Ldmwu4EoP4SpluKCG5J4hGLN-1cW5kjc-be49-N3hCrM2iSLUWACG5uPd9hnbqEusHOxt-nsGWURK-8fWXepaZ2qh_cif9LNbMNlqOqVXJ6zUEe8lVVp2nfoU5Jjaifw23nprXg6cYI_k23CwPiGi8enrzZNXu62eQvkWSoJ5fSIW0b7iKCqWijtqfDLhdnP-wCUF3VkBCBMbe-m1xMNZVPTIfpfUqWJEnfDLQZc_Md1zyVUhdK055ekm-tXoHaydxmr7ry5ZxGGm2jR0QkGF2lsxZ4nMHOfzP_FoAqu68e2AgMPochhfDnsO-ZMWjF38QZq8_tk0ocqpBh3N-KsjeZjFF-I9Jv-Xdy5tLu3lDCCTgPqfZSErdG3JszcGY4uXboVEG-5MhHODbO9g-a_yt0g5eu0BJSbYV-Nv3-QKh6eb2eZZGzbJGwf7aia5iDVbjovMR3sY";
        $headers = ['Authorization' => "Bearer $token"];
        $id = "65";
        $this->json('DELETE', '/api/delete-user/'.$id, [], $headers)
            ->assertStatus(200)
            ->assertJson([
                'message' => "Delete User Successful",
                'status'  => true
            ]);
        // $response = $this->get('/');

        // $response->assertStatus(200);
    }
    public function testNoneTokenDelUser()
    {
        $token = "";
        $headers = ['Authorization' => "Bearer $token"];
        $id = "1";
        $this->json('DELETE', '/api/delete-user/'.$id, [], $headers)
            ->assertStatus(401);
    }

    public function testIdIncorrectDelUser()
    {
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjllOWYyYWNmZTc5YzYxZjc1ZGVlN2Q2OWRlYjE5NmU0YzViNmExYjI3NzQ2YmU4ZWNmNjE5NDNiMmJlN2NiODUxMGJhZDlhNmRlZDZkNmY0In0.eyJhdWQiOiIxIiwianRpIjoiOWU5ZjJhY2ZlNzljNjFmNzVkZWU3ZDY5ZGViMTk2ZTRjNWI2YTFiMjc3NDZiZThlY2Y2MTk0M2IyYmU3Y2I4NTEwYmFkOWE2ZGVkNmQ2ZjQiLCJpYXQiOjE1MzA1MDgzMTMsIm5iZiI6MTUzMDUwODMxMywiZXhwIjoxNTMxODA0MzEzLCJzdWIiOiIzNCIsInNjb3BlcyI6WyJhZG1pblN1Y2Nlc3MiXX0.ZRRiqwg7UL7F3vfwNbhCcL1sExKEHZGCZg-TUF5YbacuP0U25wwO9yD2VZbG7NTnYzBK5Bm8Le4YMqrR0NdEOUToxkq-G0CQbMVSHN-A_GJEs1EbNEck6Dh3V59dG5Uo5MRbEEJ2aclPy_QXeliR1dS0VK-08LhT3tWf2JfGrH91mJ6EBpafxB6wFjw2kamVl8djwP4LpkZX28LrGBiJnFGPnQMrfQ3rp0Ldmwu4EoP4SpluKCG5J4hGLN-1cW5kjc-be49-N3hCrM2iSLUWACG5uPd9hnbqEusHOxt-nsGWURK-8fWXepaZ2qh_cif9LNbMNlqOqVXJ6zUEe8lVVp2nfoU5Jjaifw23nprXg6cYI_k23CwPiGi8enrzZNXu62eQvkWSoJ5fSIW0b7iKCqWijtqfDLhdnP-wCUF3VkBCBMbe-m1xMNZVPTIfpfUqWJEnfDLQZc_Md1zyVUhdK055ekm-tXoHaydxmr7ry5ZxGGm2jR0QkGF2lsxZ4nMHOfzP_FoAqu68e2AgMPochhfDnsO-ZMWjF38QZq8_tk0ocqpBh3N-KsjeZjFF-I9Jv-Xdy5tLu3lDCCTgPqfZSErdG3JszcGY4uXboVEG-5MhHODbO9g-a_yt0g5eu0BJSbYV-Nv3-QKh6eb2eZZGzbJGwf7aia5iDVbjovMR3sY";
        $headers = ['Authorization' => "Bearer $token"];
        $id = "";
        $this->json('DELETE', '/api/delete-user/'.$id, [], $headers)
            ->assertStatus(404);
    }

    public function testPemission()
    {
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjUzMGNjYTk1ZjAyZjM0NTFiN2FlM2U1NTJjMzcxNTljNTM0MDAzY2M3OTg5YWVjMDllMDg3YWU1OThlZjJkZTg1MDg4NmE3YTlhNGI4YTlkIn0.eyJhdWQiOiIxIiwianRpIjoiNTMwY2NhOTVmMDJmMzQ1MWI3YWUzZTU1MmMzNzE1OWM1MzQwMDNjYzc5ODlhZWMwOWUwODdhZTU5OGVmMmRlODUwODg2YTdhOWE0YjhhOWQiLCJpYXQiOjE1MzA1MDk3MDAsIm5iZiI6MTUzMDUwOTcwMCwiZXhwIjoxNTMxODA1NzAwLCJzdWIiOiIzNCIsInNjb3BlcyI6WyJlZGl0b3JTdWNjZXNzIl19.IhQ4NyeDu8w55dFVSk8k9ISYOs-DLinQvB1ZeihvsiWnCrY3NljrUmm9tGthuAeQmQ4uyUS66zZilE5MKwITabln2n7yHBGTFbuT9UypIeRVVw2DYrv6zW0gBc57ASGCnXzIaiT2_n0h62HJxeLmDQKpddEM7a8pZGNGpTur9Z0X6pAeVBf_MtXbfOmLQUoadbJoWosE6fMH-fKWcI_KXe6K7ui-q_w-1hq6PiVtG9Tcd3yx2yeYnQsGsPfjq8UCpwvLYkuSfGbOHXzjWyX8GzLueiVqBYYGI5DxXFaRBX-NViMVGWtLntuX8TtoJad1jzQqjxQagjBUk7WHAlvH_3s9qImCeTXpoGM0I2QQtXjIp23vka1nCVwMKoJRs7ipP2H8jknkn1cMo3K2UQi0SB1mQj3fhIMq8EUljnvJrwXAT8kSq-tA88F0jhuLtqzqobdolrkmquBocnxgMDNeyBlzTibarYEDMR_ga0zIv8iaN1w64Lm4dNqUUYmXLqsB27bFV7D-tVWILJlbks1Q5KMWEIOAdRG4k9LO8Q33OrimLMoehaESSBHQQpIYtzDpo0A3LYSFQ24CyGDysHqVrNOwiPkMo1RWlgy93xr8ATv3F5G06vrJ6DbF-F81sck_M-11tud6_ubw4SUXlWqTIEj7KGD_lFtWkQ6A2oo1Qcg";
        $headers = ['Authorization' => "Bearer $token"];
        $id = "56";
        $this->json('DELETE', '/api/get-user-by-id/'.$id, [], $headers)
            ->assertStatus(405);
    }
}

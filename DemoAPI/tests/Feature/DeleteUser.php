<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteUser extends TestCase
{
    public function testDelUser()
    {
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjA0NmM1N2NiOGJlYTY2M2EzNTlhMTBiMmJjNGI1Mzk4ZmMyZTVlODk2NDZjODgyMGE0OTJiYmRhMDI2OWIyOTVjNmM2YzY2MjEzOTc0ZGJlIn0.eyJhdWQiOiIxIiwianRpIjoiMDQ2YzU3Y2I4YmVhNjYzYTM1OWExMGIyYmM0YjUzOThmYzJlNWU4OTY0NmM4ODIwYTQ5MmJiZGEwMjY5YjI5NWM2YzZjNjYyMTM5NzRkYmUiLCJpYXQiOjE1MzA1MDM3MDEsIm5iZiI6MTUzMDUwMzcwMSwiZXhwIjoxNTMxNzk5NzAxLCJzdWIiOiIzNCIsInNjb3BlcyI6W119.IHwF6TN9jDclbWhQT4ixPKWIinO5AGGtrtbLKaWUF4Acokr9nSLuaiQs3RYNX8lzm4MsRBJJgKvuHpxbnkcORDEisXyGUEVfWj-EhtL7640NT-ZkQOYHT_Qdmp7znqhlStEeHCWJn7nJxWUPKG0RIt9nf9OOnc4F1IqvJCw_kCRymlTa1-x_I3B-01_525ZsxZs6Xbkhzrf6Iw9PJmmADTOnldjAPOlKPJH9kfPixBaBkpup0v27IDxkd2sM-v1xY8gS6xqQA1_J6UU1uq9oV-iF1w_fPj-P2fEqN2mDCrhGelkgZJEqUizdn6bJaBWSuJi7J7HaeSjXw5lTf24XdSRMe54Ibyuh_C33N506fvv6QEeUrwShDhXRuhW5yws5LXIR1vW0aOzyJiz5y8DA3-eHRaoFAQYkR5_qeTbuBCDI4Ci1_E4IzkSxxTCFc-feVaXw92cDjqy2qhhZjJ4HAnk0H7xlZ-obVUlakXKaRE8eaqPkL2e-wI0zUvb_hvT9RfZ-ux2RoB1e02fu9e1vfbRdm7_PVIMNFkxjk2DeF193dMxtjnEQVpHSNrSJoC6fo4oHvY0S-D-SyRX4XCR5eRI0zc8I1ZgCgf6hNwGTWJ7j4DjDm65vbEAKI9-w9MJOPOZZ74yQjiP3LIdcvs6Fw0HQ2LMNM4ASX8HRRn0bZxU";
        $headers = ['Authorization' => "Bearer $token"];
        $id = "54";
        $this->json('GET', '/api/delete-user/'.$id, [], $headers)
            ->assertStatus(200)
            ->assertJson([
                'message' => "Delete User Successful",
                'status'  => true
            ]);
    }
    public function testNoneToken()
    {
        $token = "";
        $headers = ['Authorization' => "Bearer $token"];
        $id = "1";
        $this->json('GET', '/api/delete-user/'.$id, [], $headers)
            ->assertStatus(401);
    }

    public function testIdIncorrect()
    {
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU3ZDczYTNmYjRkYjM5ODIxMzZlMDFmNzZhYTQwZTdmMzg2MWMyZWE2MjlkZjM0M2I5MjI5MTkyZDdhMWM5Mjc1NjM4MGM4ODMyZTBmNWNmIn0.eyJhdWQiOiIyIiwianRpIjoiZTdkNzNhM2ZiNGRiMzk4MjEzNmUwMWY3NmFhNDBlN2YzODYxYzJlYTYyOWRmMzQzYjkyMjkxOTJkN2ExYzkyNzU2MzgwYzg4MzJlMGY1Y2YiLCJpYXQiOjE1MzAyNjY4NzIsIm5iZiI6MTUzMDI2Njg3MiwiZXhwIjoxNTMxNTYyODcyLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.Mqsvlq_mMWGYrDsD-w1QPi1ZnVEefLHzXnOWTkNEf8BuWZXHMlzz4PPaQ_ARY_FiFAngng6KKirU0CGNmX2wtBQHlRjvCAUBn-TV-TqaxhMAkdnDhXxzDWvs1_9833eJodrbVSJq4Zt9N5GCXLnGz5Q_uhm1Hrrs693IEWyvfy_0NNeaTSDrkXiq8jkM3DjEEWietaz8bFONUUJczeOZ91fHRdTf6p4bQDTh-itxVe4kZc0EDkFhctxZDLLEGOOW8PEjdnX0Dl8Na92oLYjPupnpwJ7Xw2e38-WGcLNWCN7Dil0GIjswaZLzfvlZZl8t9loN43KckBQqmOaxejtycb3YMFA6ZwUPw03cUrY7u3vBKHk6jc7lQ0Dt5izNYU8ka5p81YqvlmjvZFB2Iagk6Iu3B0Q5gDboHr8gtO3QiOsoG8rkiC69DAYDaWSMqXHONJj0-9Rem34yhfQ8U2uNgBMm5zPnl65Lbxy1wHBuENtde2i_uxMrtKqles5RQoMbYMm7TTEMPL3oCk25Dxp0eSzG7l-3JHd9DL6VSQDk_s51oocMCgWd-WtzCvAk9vjYoVqSFlQ9PKp_b92XZezJUnM_UDCN5BWEI0CEoyV3K5gOT4o624PSoSPNZVpM5mTsTqZAlvNhIes0AHsNFD1dmVVCOCb8Fn1SWgKq0GjYXV0";
        $headers = ['Authorization' => "Bearer $token"];
        $id = "";
        $this->json('GET', '/api/delete-user/'.$id, [], $headers)
            ->assertStatus(404);
    }

    public function testPemission()
    {
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjY3ZmRkZGYwMjI5NTc5ZWFlZmI3YjhjYmMzNzAxMzU5ZTQxOTMxOThiODQ3NmIwNWZmMGUxNTNlZjlhY2I2ZGM1MjkyNzcwMTljMTQ2YWFjIn0.eyJhdWQiOiIxIiwianRpIjoiNjdmZGRkZjAyMjk1NzllYWVmYjdiOGNiYzM3MDEzNTllNDE5MzE5OGI4NDc2YjA1ZmYwZTE1M2VmOWFjYjZkYzUyOTI3NzAxOWMxNDZhYWMiLCJpYXQiOjE1MzA1MDI2MjcsIm5iZiI6MTUzMDUwMjYyNywiZXhwIjoxNTMxNzk4NjI3LCJzdWIiOiIzNCIsInNjb3BlcyI6WyJlZGl0b3JTdWNjZXNzIl19.mYM-Iyh3KMj73doNq0kP3xUg-Lf5aRk6ouqtqpXPxYyZ1Rrauue3FDtC5MJeiBQyN1mnAitxOfiTBDaff0tHh6_87OOkDSN-6ZLexN_YRTEUA6xuwRjAV4Hfw9xs7y3pdX3Zi9Lf-862IkkT1KR3TYYj1NEZNEEcu7ZOayb8fEegI5bblXO6R2FTRoY1JuOhZ6myiiD0UZ-wrWQ5bcPlL4qUVyFeA3XfyNaEmNUbhwzsjg9VFMjOpEMg9cNkhFu__mxM33qaXA0YseC-HEELHRMgx0CNJ2wDRFmCRCeFaUmbHcULhY53B6in_kRjrHNl3UQsSRYjjVRFCQJEK9bYGsv3sR6OqXo-UCwjM5EEtl5mSDedKUxTTB7ynFtkuS3w7XHlKvjVxIDXF0fhvuK5e8GKfE7jLuTOjxTQXhN_FKw_zR7jjo-jUNewJSsXaZ245KyelBsr7QRIrBn1W2k2kBmh9rbkwEloWu6MK3JHtuDzIBVd8zCYnjrTEIuN3MdfVhBfwrjSx1J5JpG-WyNBMKhadvQS3rFGpTCIPMUCSIYBZnpAMNxA1KJpuhFIwcn-H-ccMkhlTBEyYzkVRsK83Yixz6NeqF-_7nf-kWPyHlnZkDDNX92Mc2B2-_aPvqlY--rbQ3XrjciLO8Xqj7PdWPKMNkQrkJMInAZQ09oeCBc";
        $headers = ['Authorization' => "Bearer $token"];
        $id = "56";
        $this->json('GET', '/api/get-user-by-id/'.$id, [], $headers)
            ->assertStatus(404);
    }
}

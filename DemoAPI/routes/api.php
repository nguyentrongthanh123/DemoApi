<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('post-login', 'UserController@postLogin');
Route::post('post-register', 'UserController@postRegister');
Route::get('get-logout','UserController@getLogout');

Route::group(['middleware' => 'auth:api'], function(){

    Route::get('get-user', 'UserController@getUser');
    Route::get('get-user-by-id/{id}', 'UserController@getUserById');

    Route::group(['middleware' => 'scopes:editorSuccess,adminSuccess'],function(){
        Route::put('edit-user/{id}', 'UserController@editUser');
    });

    Route::group(['middleware' =>'scope:adminSuccess'],function(){
        Route::delete('delete-user/{id}','UserController@deleteUser');
    });
});

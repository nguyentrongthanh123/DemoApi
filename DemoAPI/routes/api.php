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

Route::post('postLogin', 'UserController@postLogin');
Route::post('postRegister', 'UserController@postRegister');

Route::group(['middleware' => 'auth:api'], function(){

    Route::get('getUser', 'UserController@getUser');
    Route::get('getUserById/{id}', 'UserController@getUserById');

    Route::group(['middleware' => 'isEditor'],function(){
        Route::put('editUser/{id}', 'UserController@editUser');
    });

    Route::group(['middleware' => 'isAdmin'],function(){
        Route::delete('deleteUser/{id}','UserController@deleteUser');
    });
});

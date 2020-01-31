<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Api" middleware group. Enjoy building your API!
|
*/
Route::post('user/login', 'Api\UserController@login');
Route::post('user/register', 'Api\UserController@register');
Route::middleware('auth.jwt')->group(function ($router){
    Route::post('user/logout', 'Api\UserController@logout');
});

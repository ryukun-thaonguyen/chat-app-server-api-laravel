<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// auth
Route::post('login', 'Auth\AuthController@login');
Route::post('logout', 'Auth\AuthController@logout');
Route::post('refresh', 'Auth\AuthController@refresh');
Route::post('me', 'Auth\AuthController@me');

//discusstion
Route::post('getUser',"Discusstion\DiscusstionController@getUser");
Route::post('get', 'Auth\AuthController@get');
Route::post('getDiscusstion', 'Discusstion\DiscusstionController@getDiscustion');
Route::post('getMessages',"Discusstion\DiscusstionController@getMessages");
Route::post('typing', 'Discusstion\DiscusstionController@typing');
Route::post('endTyping', 'Discusstion\DiscusstionController@endTyping');
Route::post('send','Discusstion\DiscusstionController@send');


Route::get('discustion',"Discusstion\DiscusstionController@get");



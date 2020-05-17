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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register', 'API\UserController@register');
Route::get('login', 'API\UserController@login');

Route::middleware('auth:api')->group( function () {
    Route::resource('products', 'API\ProductController');
    Route::get('me', 'API\UserController@details');
});

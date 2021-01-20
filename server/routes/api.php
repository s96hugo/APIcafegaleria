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

//User
Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');
Route::post('refresh', 'API\AuthController@refresh');


Route::apiResources([
    'bands' => 'API\BandController',
    'users' => 'API\UserController',
]);

//Rutas del paquete para APP

    Route::middleware('auth:api')->group(function () {
        Route::group(['namespace' => 'API'], function () {
            Route::get('users', 'UserController@index');

        });
    });



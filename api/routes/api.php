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

Route::get('/doc', 'IndexController@index');

Route::prefix('/hospital')->group(function () {
    Route::post('/', 'Api\HospitalController@store');
    Route::get('/', 'Api\HospitalController@index');
    Route::get('/{id}', 'Api\HospitalController@show');
    Route::delete('/{id}', 'Api\HospitalController@destroy');
    Route::put('/{id}', 'Api\HospitalController@update');
});

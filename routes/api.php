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



/***Agregado Contable */
Route::post('login', 'ApiController@login');
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', 'ApiController@logout');
    Route::get('get-projects', 'ApiController@getProjects');
    Route::post('add-tracker', 'ApiController@addTracker');
    Route::post('stop-tracker', 'ApiController@stopTracker');
    Route::post('upload-photos', 'ApiController@uploadImage');
});

/***Fin Agregado Contable */

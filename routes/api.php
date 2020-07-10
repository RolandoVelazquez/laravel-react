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

Route::get('/raza','api\Raza@getRazas');
Route::get('/inforazas','api\Raza@getInfoRazas');
Route::post('/add-perrito','api\Raza@addPerrito')->name('apiagregar');
Route::delete('/delete-perrito/{id}','api\Raza@deletePerrito');
Route::patch('/edit-perrito','api\Raza@editPerrito');

//rutas para las pruebas para el modelo Tamano
Route::post('/add-Tamano','api\TamanoController@addTamano')->name('api.agregar.tamano');
Route::patch('/edit-Tamano','api\TamanoController@editTamano')->name('api.edit.tamano');
Route::delete('/delete-Tamano/{id}','api\TamanoController@deleteTamano')->name('api.delete.tamano');


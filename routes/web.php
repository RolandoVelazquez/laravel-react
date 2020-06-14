<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','vistas.home')->name('home');
Route::get('/raza','Raza@getRazas')->name('razas');
Route::get('/raza/{raza}', 'Raza@getXRaza')->name('verraza');
Route::get('/sexo', 'Sexo@getSexo')->name('sexo');
Route::get('/sexo/{sexo}', 'Sexo@getXSexo')->name('versexo');
Route::get('/tamano', 'Tamano@getTamano')->name('tamano');
Route::get('/tamano/{tamano}', 'Tamano@getXTamano')->name('vertamano');

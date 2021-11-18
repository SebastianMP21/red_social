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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('pelicula','App\Http\Controllers\PeliculaController');
Route::get('api/v1/peliculas','PeliculaController@getPeliculas');

Route::resource('cliente','App\Http\Controllers\ClienteController');
Route::get('api/v1/clientes','ClienteController@getClientes');

Route::resource('renta','App\Http\Controllers\RentaController');
Route::get('api/v1/rentas','RentaController@getRentas');

Route::resource('membresia','App\Http\Controllers\MembresiaController');
Route::get('api/v1/membresias','MembresiaController@getMembresias');



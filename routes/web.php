<?php

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// Productos
Route::get('/creando-producto', 'ProductoController@crear')->name('producto.crear');
Route::post('/producto/save', 'ProductoController@save')->name('producto.save');
Route::get('/busc/{search?}', 'ProductoController@index')->name('producto.buscar');
Route::get('producto/edit/{id}', 'ProductoController@edit')->name('producto.edit');
Route::get('producto/delete/{id}', 'ProductoController@delete')->name('producto.delete');
Route::post('/producto/up', 'ProductoController@update')->name('producto.update');



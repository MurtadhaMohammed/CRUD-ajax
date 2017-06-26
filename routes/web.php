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

Route::get('/', 'nameController@getAll');
Route::post('store', 'nameController@store');
Route::post('/edit', 'nameController@update');
Route::get('/delete/{id}', 'nameController@delete');
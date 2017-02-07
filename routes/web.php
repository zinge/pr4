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

Route::get('/mvzs',  'MvzController@index');
Route::post('/mvz',  'MvzController@store');
Route::get('/mvz/{mvz}/edit', 'MvzController@edit');
Route::delete('/mvz/{mvz}', 'MvzController@destroy');
Route::put('/mvz/{mvz}', 'MvzController@update');

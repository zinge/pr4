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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/roles',  'RoleController@index');
Route::post('/role',  'RoleController@store');
Route::get('/role/{role}/edit', 'RoleController@edit');
Route::delete('/role/{role}', 'RoleController@destroy');
Route::put('/role/{role}', 'RoleController@update');

Route::get('/rolemembers', 'RolememberController@index');
Route::post('/rolemember', 'RolememberController@store');
Route::delete('rolemember/{rolemember}', 'RolememberController@destroy');


Route::get('/addresses',  'AddressController@index');
Route::post('/address',  'AddressController@store');
Route::get('/address/{address}/edit', 'AddressController@edit');
Route::delete('/address/{address}', 'AddressController@destroy');
Route::put('/address/{address}', 'AddressController@update');

Route::resource('phone', 'PhoneController');
Route::resource('equiptype', 'EquiptypeController');

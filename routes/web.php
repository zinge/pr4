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

Route::get('/home', 'HomeController@index');

Route::resource('phone', 'PhoneController');
Route::resource('equiptype', 'EquiptypeController');
Route::resource('coworker', 'CoworkerController');
Route::resource('phoneowner', 'PhoneownerController');
Route::resource('mvz',  'MvzController');
Route::resource('address',  'AddressController');
Route::resource('rolemember', 'RolememberController');
Route::resource('role',  'RoleController');
Route::resource('equip',  'EquipController');
Route::resource('fu',  'FuController');

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', 'Test\IndexController@index');

Route::get('/error', 'Test\IndexController@err_404');

Route::get('export', 'Test\IndexController@export');

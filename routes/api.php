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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('/', 'Test\IndexController@index');

Route::get('/error', 'Test\IndexController@err_404');
Route::post('file/upload/ckeditor', 'Frame\FileController@upload_ckeditor');

Route::get('test/captcha', 'Test\IndexController@captcha');
Route::get('test/check', 'Test\IndexController@check');
Route::get('test/captcha2', 'Test\IndexController@captcha2');
Route::get('/userStatusQuery', 'Test\IndexController@userStatusQuery');
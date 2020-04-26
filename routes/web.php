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
    return view('index');
});

// pemeliharaan
Route::get('/pemeliharaan','pemeliharaanController@index');
// input pekerjaan
Route::get('/pemeliharaan/pekerjaan','input_pekerjaanController@index');
Route::get('/pemeliharaan/pekerjaan-create','input_pekerjaanController@create');
Route::post('/pemeliharaan/pekerjaan-store','input_pekerjaanController@store');
Route::get('/pemeliharaan/pekerjaan-detail/{booknumber}','input_pekerjaanController@detail');
Route::get('/pemeliharaan/pekerjaan-edit/{booknumber}','input_pekerjaanController@edit');
Route::get('/pemeliharaan/pekerjaan-approve/{booknumber}','input_pekerjaanController@approve');
Route::get('/pemeliharaan/pekerjaan-cancel/{booknumber}','input_pekerjaanController@cancel');
Route::post('/pemeliharaan/pekerjaan-update/{booknumber}','input_pekerjaanController@update');
Route::get('/pemeliharaan/pekerjaan-delete-file/{booknumber}','input_pekerjaanController@deleteFile');

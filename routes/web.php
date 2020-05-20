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

// Route::get('/', function () {
//     return view('index');
// });
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','role:Admin']], function () {
    Route::get('/pemeliharaan/pekerjaan-approve/{booknumber}','input_pekerjaanController@approve');
    Route::get('/pemeliharaan/pekerjaan-disapprove/{booknumber}','input_pekerjaanController@disapprove');
    Route::get('/pemeliharaan/pekerjaan-cancel/{booknumber}','input_pekerjaanController@cancel');
    Route::get('/pemeliharaan/pekerjaan-close/{booknumber}','input_pekerjaanController@close');
    // input klasifikasi pekerjaan 
    Route::get('/pemeliharaan/klasifikasi','input_klasifikasiController@index');
    Route::get('/pemeliharaan/klasifikasi-create','input_klasifikasiController@create');
    Route::post('/pemeliharaan/klasifikasi-store','input_klasifikasiController@store');
    Route::get('/pemeliharaan/klasifikasi-edit/{id}','input_klasifikasiController@edit');
    Route::post('/pemeliharaan/klasifikasi-update/{id}','input_klasifikasiController@update');
    Route::get('/pemeliharaan/klasifikasi-delete/{id}','input_klasifikasiController@delete');
    // data pekerjaan 
    Route::get('/pemeliharaan/data','pemeliharaanController@data');
    // data organisasi
    Route::get('/organisasi-departemen','DepartemenController@index');
    Route::get('/organisasi-departemen-create','DepartemenController@create');
    Route::post('/organisasi-departemen-store','DepartemenController@store');
    Route::get('/organisasi-departemen-edit/{kd_departemen}','DepartemenController@edit');
    Route::post('/organisasi-departemen-update/{kd_departemen}','DepartemenController@update');
    Route::get('/organisasi-departemen-delete/{id}','DepartemenController@delete');
    Route::get('/organisasi-bagian/{kd_departemen}','BagianController@index');
    Route::post('/organisasi-bagian-store/{kd_departemen}','BagianController@store');
    Route::post('/organisasi-bagian-edit/{id}/{kd_departemen}','BagianController@edit');
    Route::post('/organisasi-bagian-update/{id}/{kd_departemen}','BagianController@update');
    Route::post('/organisasi-bagian-delete/{id}/{kd_departemen}','BagianController@delete');
}); 

Route::group(['middleware' => ['auth','role:Admin,Worker,User']], function () {
    // pemeliharaan
    Route::get('/pemeliharaan/dashboard','pemeliharaanController@index');
    // input pekerjaan
    Route::get('/pemeliharaan/pekerjaan','input_pekerjaanController@index');
    Route::get('/pemeliharaan/pekerjaan-create','input_pekerjaanController@create');
    Route::post('/pemeliharaan/pekerjaan-store','input_pekerjaanController@store');
    Route::get('/pemeliharaan/pekerjaan-detail/{booknumber}','input_pekerjaanController@detail');
    Route::get('/pemeliharaan/pekerjaan-edit/{booknumber}','input_pekerjaanController@edit');
    Route::post('/pemeliharaan/pekerjaan-update/{booknumber}','input_pekerjaanController@update');
    Route::get('/pemeliharaan/pekerjaan-delete-file/{id}','input_pekerjaanController@deleteFile');
});

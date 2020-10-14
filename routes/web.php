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

Route::group(['middleware' => ['auth','role:Root,Admin']], function () {
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
    // data organisasi
    Route::get('/organisasi-departemen','DepartemenController@index');
    Route::get('/organisasi-departemen-create','DepartemenController@create');
    Route::post('/organisasi-departemen-store','DepartemenController@store');
    Route::get('/organisasi-departemen-edit/{kd_departemen}','DepartemenController@edit');
    Route::post('/organisasi-departemen-update/{kd_departemen}','DepartemenController@update');
    Route::get('/organisasi-departemen-delete/{id}','DepartemenController@delete');
    // data organisasi bagian
    Route::get('/organisasi-bagian/{kd_departemen}','BagianController@index');
    Route::post('/organisasi-bagian-store/{kd_departemen}','BagianController@store');
    Route::get('/organisasi-bagian-edit/{kd_bagian}','BagianController@edit');
    Route::post('/organisasi-bagian-update/{kd_bagian}','BagianController@update');
    Route::get('/organisasi-bagian-delete/{id}','BagianController@delete');
    // data organisasi seksi
    Route::get('/organisasi-seksi/{kd_bagian}','SeksiController@index');
    Route::post('/organisasi-seksi-store/{kd_bagian}','SeksiController@store');
    Route::get('/organisasi-seksi-edit/{kd_seksi}','SeksiController@edit');
    Route::post('/organisasi-seksi-update/{kd_seksi}','SeksiController@update');
    Route::get('/organisasi-seksi-delete/{id}','SeksiController@delete');
    // data organisasi regu
    Route::get('/organisasi-regu/{kd_seksi}','ReguController@index');
    Route::post('/organisasi-regu-store/{kd_seksi}','ReguController@store');
    Route::get('/organisasi-regu-edit/{kd_regu}','ReguController@edit');
    Route::post('/organisasi-regu-update/{kd_regu}','ReguController@update');
    Route::get('/organisasi-regu-delete/{id}','ReguController@delete');
});

Route::group(['middleware' => ['auth','role:Root,Admin,Worker,User']], function () {
    // data pekerjaan
    Route::get('/pemeliharaan/data','pemeliharaanController@data');
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
    Route::get('/pemeliharaan/pekerjaan-proceed/{booknumber}','input_pekerjaanController@proceed');
    Route::get('/pemeliharaan/pekerjaan-done/{booknumber}','input_pekerjaanController@done');
    Route::get('/pemeliharaan/pekerjaan-accepted/{booknumber}','input_pekerjaanController@accepted');
    // laporan kegiatan
    Route::get('/pemeliharaan/laporan','LaporanController@index');
    Route::post('/pemeliharaan/laporan-search','LaporanController@search');
    Route::get('/pemeliharaan/laporan-preview/{awal}/{akhir}','LaporanController@preview');
    //input SP sewa
    Route::get('/transport/sewa-sp-create', 'SpSewaController@spsewa');
    Route::post('/transport/sewa-sp-store','SpSewaController@store');
    Route::get('/transport/sewa-sp-tampil', 'SpSewaController@tampilsp');
    Route::get('/transport/tampilsp', 'SpSewaController@tampilsp');
    Route::get('/transport/cari', 'SpSewaController@cari');
    Route::get('/transport/sewa-sp-edit/{kd_sp}','SpSewaController@edit_sp');
    Route::post('/transport/update/{kd_sp}','SpSewaController@update');
     //input berita acara kendaraan sewa
    Route::get('/transport/sewa-ba-create', 'BAController@index');
    Route::post('/transport/sewa-ba-store', 'BAController@store');
    Route::get('/transport/sewa-ba-tampil', 'BAController@tampilba');
    Route::get('/transport/sewa-ba-edit/{kd_ba}', 'BAController@editba');
    Route::post('/transport/sewa-ba-update/{id}', 'BAController@update');
    Route::get('/transport/sewa-tarif-tampil', 'TarifSewaEsdController@tampiltarif');
    Route::get('/transport/sewa-tarif-create', 'TarifSewaEsdController@create');
    Route::post('/transport/sewa-tarif-store','TarifSewaEsdController@store');
    Route::get('/transport/sewa-tarif-edit/{kd_tarif}', 'TarifSewaEsdController@edit');
    Route::post('/transport/sewa-tarif-update/{kd_tarif}','TarifSewaEsdController@update');
    Route::get('/transport/sewa-tarif-cari', 'TarifSewaEsdController@cari');
     //input kendaraan sewa
    Route::get('/transport/kendaraan-create', 'KendaraanController@create');
    Route::post('/transport/kendaraan-store','KendaraanController@store');
    Route::get('/transport/kendaraan-tampil', 'KendaraanController@tampilkend');
    Route::get('/transport/kendaraan-edit/{id}', 'KendaraanController@edit');
    Route::post('/transport/kendaraan-edit/{id}', 'KendaraanController@update');
    Route::get('/transport/cari1', 'KendaraanController@cari1');
     //input servie request sewa
    Route::get('/transport/sr-create', 'SrController@create');
    Route::post('/transport/sr-store','SrController@store');
    Route::get('/transport/sr-tampil', 'SrController@tampilsr');
    Route::get('/transport/sr-detail/{kd_sr}', 'SrController@detail');
    Route::get('/transport/sr-cari', 'SrController@cari');
    Route::get('/transport/sr-edit/{id}', 'SrController@edit');
    Route::post('/transport/sr-update/{id}', 'SrController@update');
    Route::get('transport/sr-preview/{kd_sr}', 'SrController@preview');
    Route::get('/transport/sr-esd-create', 'SrEsdController@create');
    Route::get('/transport/sr-esd-nopol/{kd_sr}/{kd_tarif}', 'SrEsdController@index_store_nopol');
    Route::post('/transport/sr-esd-store-nopol/{kd_sr}/{kd_tarif}', 'SrEsdController@store_nopol');
    Route::post('/transport/sr-esd-store','SrEsdController@store');

     //input purchase request sewa
    Route::get('/transport/pr-create', 'PrController@create');
    Route::post('/transport/pr-store','PrController@store');
    Route::get('/transport/pr-tampil', 'PrController@tampil');
    Route::get('/transport/pr-cari', 'PrController@cari');
    Route::get('/transport/pr-edit/{id}', 'PrController@edit');
    Route::post('/transport/pr-update/{id}', 'PrController@update');
     //input ok sewa
    Route::get('/transport/ok-create', 'OkController@create');
    Route::post('/transport/ok-store','OkController@store');
    Route::get('/transport/ok-tampil', 'OkController@tampil');
    Route::get('/transport/cari', 'OkController@cari');
    Route::get('/transport/ok-edit/{id}', 'OkController@edit');
    Route::post('/transport/ok-update/{id}', 'OkController@update');
     //input bariksama sewa
    Route::get('/transport/bariksama-create', 'BaRiksamaController@create');
    Route::post('/transport/bariksama-store','BaRiksamaController@store');
    Route::get('/transport/bariksama-edit/{id}', 'BaRiksamaController@edit');
    Route::post('/transport/bariksama-update/{id}', 'BaRiksamaController@update');
    Route::get('/transport/bariksama-tampil', 'BaRiksamaController@tampil');
    Route::get('/transport/bariksama-cari', 'BaRiksamaController@cari');
    Route::get('transport/bariksama-print/{kd_riksama}', 'BaRiksamaController@print');
    //parkirtol
    Route::get('/transport/parkirtol', 'parkirtolController@index');
    Route::get('/transport/parkirtol-create', 'parkirtolController@create');
    Route::post('/transport/parkirtol-store', 'parkirtolController@store')->name('transport.parkirtol-store');
    Route::get('/transport/parkirtol-data', 'parkirtolController@data')->name('transport.parkirtol-data');
    Route::post('/transport/parkirtol-data', 'parkirtolController@detailparkirtol');
    Route::post('/transport/parkirtol-approveAll', 'parkirtolController@approveAll');
    Route::post('/transport/parkirtol-approve', 'parkirtolController@approve');
    Route::get('/transport/parkirtol-bayar', 'parkirtolController@bayar')->name('transport.parkirtol-bayar');
    Route::post('/transport/parkirtol-bayar', 'parkirtolController@detailbayar');
    Route::post('/transport/parkirtol-closeAll', 'parkirtolController@closeAll');
    Route::post('/transport/parkirtol-close', 'parkirtolController@close');
    Route::get('/transport/parkirtol-edit/{kd_parkirtol}', 'parkirtolController@edit');
    Route::post('/transport/parkirtol-update/{kd_parkirtol}', 'parkirtolController@update');
    Route::get('/transport/parkirtol-detail/{kd_parkirtol}', 'parkirtolController@detail');

    //uangmuka
    Route::get('/transport/uangmuka', 'uangmukaController@index');
    Route::get('/transport/uangmuka-create', 'uangmukaController@create');
    Route::post('/transport/uangmuka-store', 'uangmukaController@store');
    Route::get('/transport/uangmuka-edit/{kd_uangmuka}', 'uangmukaController@edit');
    Route::post('/transport/uangmuka-update/{kd_uangmuka}', 'uangmukaController@update');
    Route::get('/transport/uangmuka-detail/{kd_uangmuka}', 'uangmukaController@detail');
    Route::get('/transport/uangmuka-data', 'uangmukaController@data');
    Route::get('/transport/uangmuka-realisasi', 'uangmukaController@realisasi');
    Route::get('/transport/uangmuka-laporan', 'uangmukaController@laporan');
});

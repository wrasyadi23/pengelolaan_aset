<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/get-area', 'Api\GetResponse@getAlamat');
Route::post('/get-keterangan', 'Api\GetResponse@getKeterangan');
Route::post('/get-departemen', 'Api\GetResponse@getBagian');
Route::post('/get-bagian', 'Api\GetResponse@getSeksi');
Route::post('/get-seksi', 'Api\GetResponse@getRegu');
Route::post('/get-tarif', 'Api\GetResponse@getTarif');
Route::post('/get-merk', 'Api\GetResponse@getMerk');
Route::post('/get-gl-acc', 'Api\GetResponse@getGLAccount');
Route::post('/get-kd-aktifitas-rkap', 'Api\GetResponse@getKodeAktifitasRkap');

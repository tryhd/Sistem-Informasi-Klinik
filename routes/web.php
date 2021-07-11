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
    return view('dashboard.dashboard');
});
Route::resource('/home', 'HomeController');
Route::resource('/obat', 'ObatController');
Route::resource('/tindakan','TindakanController');
Route::resource('/wilayah','WilayahController');
Route::resource('/pasien','PasienController');
Route::resource('/pegawai','PegawaiController');
Route::resource('/pemeriksaan','PemeriksaanController');

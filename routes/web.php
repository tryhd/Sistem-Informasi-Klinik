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
    return view('auth.login');
});
//Auth
Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@PostLogin')->name('postLogin');

route::group(['middleware'=>'auth'],
function(){
Route::post('/logout','AuthController@Logout')->name('logout');
Route::resource('/home', 'HomeController');
Route::resource('/obat', 'ObatController');
Route::resource('/tindakan','TindakanController');
Route::resource('/wilayah','WilayahController');
Route::resource('/pasien','PasienController');
Route::resource('/pegawai','PegawaiController');
Route::resource('/pemeriksaan','PemeriksaanController');
Route::resource('/resep','ResepController');
Route::get('/laporan','LaporanController@index')->name('laporan-index');
Route::get('/laporanpdf','LaporanController@laporanpdf')->name('laporan-pdf');
}
);

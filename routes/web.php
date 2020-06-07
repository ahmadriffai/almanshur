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
// Santri



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Route User
 */
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UserController', ['except' => ['show','create','store']]);
});

/**
 * Route kelas
 */
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-kelas-kamar')->group(function(){
    Route::resource('/kelas', 'KelasController', ['exept' => ['show','create']]);
});
/**
 * Route kamar
 */
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-kelas-kamar')->group(function(){
    Route::resource('/kamar', 'kamarController', ['except' => ['show','create']]);
});

/**
 * Route Tagihan
 */

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-tagihan')->group(function(){
    Route::resource('/tagihan', 'TagihanController',['except' => ['show','create']]); 
});

/**
 * Route santri
 */
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-santri')->group(function(){
    Route::resource('/santri', 'SantriController'); 
});
/**
 * Route Santri Baru
 */
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-pengurus')->group(function(){
    Route::resource('/santri-baru', 'SantriBaruController',['except' => ['show','create','store','delete']]);
    
});
/**
 * Route Upload
 */
Route::get('/user/upload_foto_santri{santri}', 'User\UploadController@uploadFotoSantri')->name('user.upload.upload_santri')->middleware('can:manage-user');
Route::post('/user/upload_foto_santri', 'User\UploadController@uploadFotoSantri')->name('user.upload.upload_foto_santri')->middleware('can:manage-user');
/**
 * Route Pembayaran
 */
Route::get('/pengurus/pembayaran/pembayaran_santri', 'Pengurus\PembayaranController@pembayaranSantri')->name('pengurus.pembayaran.pembayaran_santri')->middleware('can:manage-bendahara');

Route::get('/pengurus/pembayaran/{pembayaran}/{tagihan}/byr', 'Pengurus\PembayaranController@bayarTagihan')->name('pengurus.pembayaran.byr')->middleware('can:manage-bendahara');

Route::get('/pengurus/pembayaran/', 'Pengurus\PembayaranController@index')->name('pengurus.pembayaran.index')->middleware('can:manage-bendahara');

Route::get('/pengurus/pembayaran/{pembayaran}/tagihan', 'Pengurus\PembayaranController@tagihan')->name('pengurus.pembayaran.tagihan')->middleware('can:manage-bendahara');

Route::get('/pengurus/pembayaran/{idTagihan}/{idSantri}', 'Pengurus\PembayaranController@bayar')->name('pengurus.pembayaran.bayar')->middleware('can:manage-bendahara');

/**
 * Pendaftaran
 */
Route::post('/user/upload_kk', 'User\PendaftaranController@uploadKartuKeluarga')->name('user.pendaftaran.upload_kk')->middleware('can:manage-user');
Route::get('/user/tagihan', 'User\PendaftaranController@tagihan')->name('user.pendaftaran.tagihan')->middleware('can:manage-user');

/**
 * Tagihan Per Santri
 */
Route::get('/santri/pembayaran/{santri}/konfirmasi', 'Santri\PembayaranController@konfirmasi')->name('santri.pembayaran.konfirmasi')->middleware('can:manage-santri');

Route::put('/santri/pembayaran/{santri}/konfirm_pembayaran', 'Santri\PembayaranController@konfirmPembayaran')->name('santri.pembayaran.konfirm_pembayaran')->middleware('can:manage-santri');

Route::get('/santri/pembayaran/{santri}', 'Santri\PembayaranController@index')->name('santri.pembayaran.index')->middleware('can:manage-santri');

Route::get('/santri/pembayaran/{idTagihan}/{idSantri}', 'Santri\PembayaranController@bayar')->name('santri.pembayaran.bayar')->middleware('can:manage-santri');



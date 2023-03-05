<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;


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

Route::get('/biodata', function () {
    echo "tampil data";
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'store']);
    Route::post('/profile/password', [ProfileController::class, 'storepassword']);

    Route::group(['middleware'=>'role:admin'], function(){
    Route::resource('/user', UserController::class);
    });

    Route::group(['middleware'=>'role:hrd'], function(){
    Route::get('/tampilkaryawan', [KaryawanController::class, 'tampil']);
    Route::get('/karyawan', [KaryawanController::class, 'index']);
    Route::get('/tampilbuilder', [KaryawanController::class, 'tampilbuilder']);
    Route::get('/tampilorm', [KaryawanController::class, 'tampilorm']);
    Route::get('/karyawan/create', [KaryawanController::class, 'create']);
    Route::post('/karyawan', [KaryawanController::class, 'store']);
    Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit']);
    Route::post('/karyawan/{id}', [KaryawanController::class, 'update']);
    Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);
    Route::get('/jabatan/cetak', [JabatanController::class, 'cetak']);
    Route::resource('/jabatan', JabatanController::class);
    });

    Route::group(['middleware'=>'role:gudang'], function(){
    Route::resource('/produk', ProdukController::class);
    Route::resource('/pembelian', PembelianController::class);
    Route::resource('/penjualan', PenjualanController::class);
    });

});

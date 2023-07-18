<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Login

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Setting AKun
Route::get('/settings', [App\Http\Controllers\PegawaiController::class, 'changePassword'])->name('setting');
Route::put('/change/{id}', [App\Http\Controllers\PegawaiController::class, 'updatePassword'])->name('update.pass');

//Admin
Route::group(['prefix' => 'Admin', 'middleware' => ['auth']], function(){
    Route::resource('pegawai', PegawaiController::class);
});

//PNS
Route::group(['prefix' => 'PNS', 'middleware' => ['auth']], function(){
    Route::get('profile-pegawai', [PegawaiController::class, 'showPegawai'])->name('show.pegawai');
    Route::put('/pegawai/{id}', [App\Http\Controllers\PegawaiController::class, 'updateData'])->name('update.pegawai');
    Route::put('/kepegawaian/{id}', [App\Http\Controllers\PegawaiController::class, 'updateKepegawaian'])->name('update.kepegawaian');
    Route::put('/sutri/{id}', [App\Http\Controllers\PegawaiController::class, 'updateSI'])->name('update.sutri');
    //Data Anak :
    Route::get('/anak-tambah', [App\Http\Controllers\PegawaiController::class, 'createAnak'])->name('anak.tambah');
    Route::post('/anak-simpan', [App\Http\Controllers\PegawaiController::class, 'anakCreate'])->name('anak.store');
    Route::get('/anak/{id}/edit', [App\Http\Controllers\PegawaiController::class, 'editAnak'])->name('anak.edit');
    Route::put('/anak/{id}', [App\Http\Controllers\PegawaiController::class, 'updateAnak'])->name('anak.update');

    //Route Ambil Data Padaringan :
    Route::get('/fetchPadaringan', [PegawaiController::class, 'fetchPadaringan'])->name('get.padaringan');
    Route::resource('anak', AnakController::class);
});



<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PenilaianPesertaController;use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('welcome');

Route::prefix('/auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('/user-admin')->name('userAdmin.')->group(function () {
    Route::get('/beranda', [MainController::class, 'admin_beranda'])->name('beranda');

    Route::resource('kecamatan', '\App\Http\Controllers\KecamatanController');
    Route::resource('kelurahan', '\App\Http\Controllers\KelurahanController');
    Route::resource('jabatan', '\App\Http\Controllers\JabatanController');
    Route::resource('penyuluh', '\App\Http\Controllers\PenyuluhController');
    Route::resource('penyuluhan', '\App\Http\Controllers\PenyuluhanController');
    Route::resource('peserta', '\App\Http\Controllers\PesertaController');
    Route::resource('objekPenilaian', '\App\Http\Controllers\ObjekPenilaianController');
});

Route::prefix('/user-penyuluh')->name('userPenyuluh.')->group(function () {
    Route::get('/beranda', [MainController::class, 'penyuluh_beranda'])->name('beranda');
    Route::get('/profil', [MainController::class, 'penyuluh_profil'])->name('profil');
    Route::put('/profil/update/{id}', [MainController::class, 'penyuluh_profil_update'])->name('profil.update');
    Route::resource('penyuluhan_penyuluh', '\App\Http\Controllers\PenyuluhanPenyuluhController');
    Route::resource('peserta_penyuluh', '\App\Http\Controllers\PesertaPenyuluhController');

    Route::prefix('/penilaian_peserta')->name('penilaian_peserta.')->group(function () {
        Route::get('/{id}', [PenilaianPesertaController::class, 'index'])->name('index');
        Route::post('/create', [PenilaianPesertaController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PenilaianPesertaController::class, 'edit'])->name('edit');
        Route::put('/index/{id}', [PenilaianPesertaController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [PenilaianPesertaController::class, 'destroy'])->name('destroy');
    });
});

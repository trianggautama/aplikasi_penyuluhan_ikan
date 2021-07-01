<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    MainController,AuthController
};

Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('/auth')->name('auth.')->group(function (){
    Route::get('/login', [AuthController::class, 'login'])->name('login'); 
});

Route::prefix('/user-admin')->name('userAdmin.')->group(function (){
    Route::get('/beranda', [MainController::class, 'admin_beranda'])->name('beranda'); 

    Route::resource('kecamatan', '\App\Http\Controllers\KecamatanController');
    Route::resource('kelurahan', '\App\Http\Controllers\KelurahanController');
    Route::resource('jabatan', '\App\Http\Controllers\JabatanController');
    Route::resource('penyuluh', '\App\Http\Controllers\PenyuluhController');
});

Route::prefix('/user-penyuluh')->name('userPenyuluh.')->group(function (){
    Route::get('/beranda', [MainController::class, 'penyuluh_beranda'])->name('beranda'); 
});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PenilaianPesertaController;use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PenyuluhController;
use App\Http\Controllers\PenyuluhanController;

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

    Route::get('/peserta/filter/cetak', [PesertaController::class, 'filter'])->name('peserta.filter'); 
    Route::get('/penyuluh/filter/cetak', [PenyuluhController::class, 'filter'])->name('penyuluh.filter'); 
    Route::get('/penyuluhan/filter_detail/cetak', [PenyuluhanController::class, 'filter_detail'])->name('penyuluhan.filter_detail'); 
    Route::get('/penyuluhan/filter_sk/cetak', [PenyuluhanController::class, 'filter_sk'])->name('penyuluhan.filter_sk'); 
    Route::get('/penyuluhan/filter_kehadiran/cetak', [PenyuluhanController::class, 'filter_kehadiran'])->name('penyuluhan.filter_kehadiran'); 
    Route::get('/peserta/filter_kartu/cetak', [PesertaController::class, 'filter_kartu'])->name('peserta.filter_kartu'); 
    Route::get('/peserta/filter_penilaian/cetak', [PesertaController::class, 'filter_penilaian'])->name('peserta.filter_penilaian'); 
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

Route::prefix('/user-peserta')->name('userPeserta.')->group(function () {
    Route::get('/beranda', [MainController::class, 'peserta_beranda'])->name('beranda');
    Route::get('/profil', [MainController::class, 'peserta_profil'])->name('profil');
    Route::put('/profil/update/{id}', [MainController::class, 'peserta_profil_update'])->name('profil.update');
});

Route::prefix('/report')->name('report.')->group(function () {
    Route::get('/penyuluh', [ReportController::class, 'penyuluh'])->name('penyuluh');
    Route::get('/penyuluh_detail/{id}', [ReportController::class, 'penyuluh_detail'])->name('penyuluh_detail'); 
    Route::get('/penyuluhan', [ReportController::class, 'penyuluhan'])->name('penyuluhan');
    Route::get('/sk_penyuluhan/{id}', [ReportController::class, 'sk_penyuluhan'])->name('sk_penyuluhan');
    Route::get('/penyuluhan/detail/{id}', [ReportController::class, 'detail_penyuluhan'])->name('detail_penyuluhan');
    Route::get('/peserta', [ReportController::class, 'peserta'])->name('peserta');
    Route::get('/kartu_peserta/{id}', [ReportController::class, 'kartu_peserta'])->name('kartu_peserta');
    Route::get('/penyuluhan_penyuluh', [ReportController::class, 'penyuluhan_penyuluh'])->name('penyuluhan_penyuluh');
    Route::get('/penilaian_peserta/{id}', [ReportController::class, 'penilaian_peserta'])->name('penilaian_peserta');
    Route::get('/daftar_hadir/{id}', [ReportController::class, 'daftar_hadir'])->name('daftar_hadir'); 
    Route::get('/peserta/filter/', [ReportController::class, 'peserta_filter'])->name('peserta.filter');
    Route::get('/penyuluh_detail/filter/cetak', [ReportController::class, 'penyuluh_detail_filter'])->name('penyuluh_detail.filter'); 
    Route::get('/penyuluhan_detail/filter/cetak', [ReportController::class, 'penyuluhan_detail_filter'])->name('penyuluhan_detail.filter'); 
    Route::get('/penyuluhan_sk/filter/cetak', [ReportController::class, 'penyuluhan_sk_filter'])->name('penyuluhan_sk.filter'); 
    Route::get('/penyuluhan_kehadiran/filter/cetak', [ReportController::class, 'penyuluhan_kehadiran_filter'])->name('penyuluhan_kehadiran.filter'); 
    Route::get('/peserta_kartu/filter/cetak', [ReportController::class, 'peserta_kartu_filter'])->name('peserta_kartu.filter'); 
    Route::get('/peserta_penilaian/filter/cetak', [ReportController::class, 'peserta_penilaian_filter'])->name('peserta_penilaian.filter'); 
});

Route::get('/api/peserta/{id}', [PesertaController::class, 'api'])->name('api.peserta'); 

 
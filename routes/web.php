<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\Pendaftaran;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PresmaboardController;
use App\Http\Controllers\PresmaboardBackofficeController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SiakadController; // ✅ Tambah ini
use App\Models\Berita;

/*
|--------------------------------------------------------------------------
| ROUTE LANDING & WELCOME
|--------------------------------------------------------------------------
*/
Route::view('/', 'prestasiprima.pages.landing');
Route::view('/welcome', 'welcome');

/*
|--------------------------------------------------------------------------
| ROUTE SAMBUTAN
|--------------------------------------------------------------------------
*/
Route::get('/sambutan', [SambutanController::class, 'index'])->name('sambutan');

/*
|--------------------------------------------------------------------------
| ROUTE PENDAFTARAN
|--------------------------------------------------------------------------
*/
Route::controller(Pendaftaran::class)->group(function () {
    Route::get('/pendaftaran', 'index')->name('pendaftaran');
});

Route::controller(FormulirController::class)->group(function () {
    Route::get('/formulir', 'create')->name('pendaftaran.formulir');
    Route::post('/formulir', 'store')->name('pendaftaran.formulir.store');
    Route::get('/validasi', 'validasi')->name('pendaftaran.validasi');
});

/*
|--------------------------------------------------------------------------
| ROUTE PRESMABOARD
|--------------------------------------------------------------------------
*/
Route::get('/presmaboard', [PresmaboardController::class, 'index']);
Route::get('/backoffice/presmaboard', [PresmaboardBackofficeController::class, 'index']);

/*
|--------------------------------------------------------------------------
| ROUTE GALERI
|--------------------------------------------------------------------------
*/
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

/*
|--------------------------------------------------------------------------
| ROUTE BERITA
|--------------------------------------------------------------------------
*/
Route::get('/berita', function () {
    $berita = Berita::latest()->get();
    return view('prestasiprima.pages.berita.home', compact('berita'));
})->name('berita.home');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('berita/splash/{step?}', 'prestasiprima.admin.berita.splash')->name('berita.splash');
    Route::resource('berita', BeritaController::class);
});

/*
|--------------------------------------------------------------------------
| ROUTE SIAKAD
|--------------------------------------------------------------------------
*/
Route::prefix('siakad')->name('siakad.')->controller(SiakadController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/jadwal', 'jadwal')->name('jadwal');
    Route::get('/absensi', 'absensi')->name('absensi');
    Route::get('/nilai', 'nilai')->name('nilai');
    Route::get('/pkl', 'pkl')->name('pkl');
    Route::get('/pengumuman', 'pengumuman')->name('pengumuman');
    Route::get('/pesan', 'pesan')->name('pesan');
    Route::get('/profile', 'profile')->name('profile');
});

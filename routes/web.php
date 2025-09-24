<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\PresmaboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\Pendaftaran;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PresmalanceController;
use App\Http\Controllers\PresmaAuthController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\Errorcontroller;
use App\Http\Controllers\siakad\auth\AuthController as SiakadAuthController;
use App\Http\Controllers\Siakad\DashboardController;


Route::get('/', function () {
    return view('prestasiprima.pages.landing');
});

Route::get('/welcome', function () {
    return view('welcome');
});

// Sambutan
Route::get('/sambutan', [SambutanController::class, 'index'])->name('sambutan');

// Pendaftaran
Route::get('/pendaftaran', [Pendaftaran::class, 'index'])->name('pendaftaran');

// Formulir Pendaftaran
Route::get('/formulir', [FormulirController::class, 'create'])->name('pendaftaran.formulir');
Route::post('/formulir', [FormulirController::class, 'store'])->name('pendaftaran.formulir.store');

// Validasi Pendaftaran
Route::get('/validasi', [FormulirController::class, 'validasi'])->name('pendaftaran.validasi');
Route::get('/presmalance', [PresmalanceController::class, 'presmalance'])->name('presmalancer.presmalance');
Route::get('/login', [PresmalanceController::class, 'login'])->name('login');
Route::post('/login', [PresmaAuthController::class, 'login'])->name('login.post');

Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

Route::get('/forum', [PresmalanceController::class, 'forum'])->name('forum');

// ================= SIAKAD =================
Route::prefix('siakad')->name('siakad.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

// Route::view('/siakad/login', 'siakad.auth.login')->name('siakad.login');
Route::get('/siakad/login', function () {
    return view('siakad.auth.siakad-login');
});

// siakad
Route::prefix('siakad')->group(function () {
    Route::get('/login', [SiakadAuthController::class, 'showLogin'])->name('siakad.login');
    Route::post('/login', [SiakadAuthController::class, 'login'])->name('siakad.login.submit');
    Route::get('/logout', [SiakadAuthController::class, 'logout'])->name('siakad.logout');

    Route::middleware('auth:siakad')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('siakad.dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
    });
});

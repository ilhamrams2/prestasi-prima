<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\Pendaftaran;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PresmalanceController;
use App\Http\Controllers\PresmaAuthController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\JoblistController;
use App\Http\Controllers\AdminJoblistController;

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

Route::prefix('/joblist')->group(function () {
    Route::get('/', [JoblistController::class, 'index'])->name('joblist.index');
    Route::get('/create', [JoblistController::class, 'create'])->name('joblist.create');
    Route::post('/store', [JoblistController::class, 'store'])->name('joblist.store');
    Route::post('/take/{id}', [JoblistController::class, 'take'])->name('joblist.take');
    Route::delete('/delete/{id}', [JoblistController::class, 'destroy'])->name('joblist.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('jobs', AdminJoblistController::class);
});
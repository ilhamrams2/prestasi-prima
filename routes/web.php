<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\Pendaftaran;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PresmaboardController;
use App\Http\Controllers\PresmaboardBackofficeController;


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

// Presmaboard
Route::get('/presmaboard', [PresmaboardController::class, 'index']);

// Presmaboard Backoffice (Protected Route)
Route::middleware(['auth'])->group(function () {
    Route::get('/backoffice/presmaboard', [PresmaboardBackofficeController::class, 'index']);
});
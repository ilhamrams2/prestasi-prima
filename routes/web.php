<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\Pendaftaran;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('prestasiprima.pages.landing');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/sambutan', [SambutanController::class, 'index'])->name('sambutan');

Route::get('/pendaftaran', [Pendaftaran::class, 'index'])->name('pendaftaran');

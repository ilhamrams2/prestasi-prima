<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//======================== ROUTE API CHATBOT ========================//
Route::post('/chatbot-send', [ChatbotController::class, 'sendMessage']);
Route::post('/chatbot-clear', [ChatbotController::class, 'clearChat']);
Route::get('/chatbot-history', [ChatbotController::class, 'getChatHistory']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TempatFutsalController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AuthController;

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
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('edit/{id}', [AuthController::class, 'edit']);


Route::get('/lapangans/{id}', [LapanganController::class, 'index']);
Route::get('/lapangans/detail/{id}', [LapanganController::class, 'show']);
Route::post('/lapangans', [LapanganController::class, 'store']);
Route::put('/lapangans/{id}', [LapanganController::class, 'update']);
Route::delete('/lapangans/{id}', [LapanganController::class, 'destroy']);


Route::get('/tempat-futsals', [TempatFutsalController::class, 'index']);
Route::get('/tempat-futsals/validasi/{id}', [TempatFutsalController::class, 'user_valid']);
Route::get('/tempat-futsals/{id}', [TempatFutsalController::class, 'show']);
Route::post('/tempat-futsals', [TempatFutsalController::class, 'store']);
Route::put('/tempat-futsals/{id}', [TempatFutsalController::class, 'update']);
Route::delete('/tempat-futsals/{id}', [TempatFutsalController::class, 'destroy']);

Route::get('/pesanans', [PesananController::class, 'index']);
Route::get('/pesanans/{id}', [PesananController::class, 'show']);
Route::post('/pesanans', [PesananController::class, 'store']);
Route::put('/pesanans/{id}', [PesananController::class, 'update']);
Route::delete('/pesanans/{id}', [PesananController::class, 'destroy']);


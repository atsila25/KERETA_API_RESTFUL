<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KeretaController;
use App\Http\Controllers\StasiunController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);

// Endpoints untuk stasiun
Route::controller(StasiunController::class)->group(function () {
    Route::get('stasiun', 'index');
    Route::post('stasiun', 'store');
    Route::get('stasiun/{id}', 'show');
    Route::put('stasiun/{id}', 'update');
    Route::delete('stasiun/{id}', 'delete');
    Route::get('local', 'local');
    Route::get('intercity', 'intercity');

});

// Endpoints untuk kereta
Route::controller(KeretaController::class)->group(function () {
    Route::get('kereta', 'index');
    Route::post('kereta', 'store');
    Route::get('kereta/{id}', 'show');
    Route::put('kereta/{id}', 'update');
    Route::delete('kereta/{id}', 'delete');
});

// Endpoints untuk jadwal
Route::controller(JadwalController::class)->group(function () {
    Route::get('jadwal', 'index');
    Route::post('jadwal', 'store');
    Route::get('jadwal/{id}', 'show');
    Route::put('jadwal/{id}', 'update');
    Route::delete('jadwal/{id}', 'delete');
});

// Endpoint jika route tidak ditemukan
Route::fallback(function () {
    return response()->json([
        'status' => 'failed',
        'message' => 'end-point not found',
    ]);
});

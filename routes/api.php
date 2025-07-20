<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/kos', [App\Http\Controllers\KosController::class, 'index']);
Route::get('/kos/{id}', [App\Http\Controllers\KosController::class, 'show']);
Route::post('/kos/store', [App\Http\Controllers\KosController::class, 'store']);
Route::put('/kos/{id}/update', [App\Http\Controllers\KosController::class, 'update']);
Route::delete('/kos/{id}/destroy', [App\Http\Controllers\KosController::class, 'destroy']);

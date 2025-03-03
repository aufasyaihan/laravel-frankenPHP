<?php
use App\Http\Controllers\KrsController;
use Illuminate\Support\Facades\Route;

Route::get('/krs', [KrsController::class, 'index']);
Route::get('/krs/{id}', [KrsController::class, 'show']);
Route::post('/krs', [KrsController::class, 'store']);
Route::put('/krs/{id}', [KrsController::class, 'update']);
Route::delete('/krs/{id}', [KrsController::class, 'destroy']);

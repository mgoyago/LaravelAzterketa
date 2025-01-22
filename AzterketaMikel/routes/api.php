<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

use App\Http\Controllers\EkitaldiakController;

Route::apiResource('ekitaldia', EkitaldiakController::class);

use App\Http\Controllers\DentistController;

Route::middleware(['auth:sanctum'])->get('/dentistak', [DentistController::class, 'index']);

use App\Http\Controllers\EkitaldiakUserController;

Route::post('/ekitaldiak/{Id}/sartu', [EkitaldiakUserController::class, 'userEkitaldianSartu']);
Route::get('/partehartzaileak/{Id}', [EkitaldiakUserController::class, 'parteHartzaileakIkusi']);
Route::get('/ekitaldiak/{Id}', [EkitaldiakUserController::class, 'nireEkitaldiakIkusi']);
Route::middleware('auth:sanctum')->post('/izenaeman/{Id}', [EkitaldiakUserController::class, 'ekitaldianSartu']);
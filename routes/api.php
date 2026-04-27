<?php

use App\Http\Controllers\AeroportController;
use App\Http\Controllers\AvioController;
use App\Http\Controllers\CompanyiaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VolController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('aeroports', AeroportController::class);
Route::apiResource('avions', AvioController::class);
Route::apiResource('companyies', CompanyiaController::class);
Route::apiResource('vols', VolController::class);
Route::apiResource('users', UserController::class);

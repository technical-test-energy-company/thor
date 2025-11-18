<?php

namespace App\Asset;

use Illuminate\Support\Facades\Route;

Route::apiResource('assets', AssetController::class)
    ->middleware('auth:sanctum');
Route::post('assets/{asset}/calculate-risk', [AssetController::class, 'calculateRisk'])
    ->middleware('auth:sanctum');

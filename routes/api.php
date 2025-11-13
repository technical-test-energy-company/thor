<?php

use App\Asset\AssetController;
use Illuminate\Support\Facades\Route;

Route::apiResource('assets', AssetController::class);

// Route::apiResources([
//     'posts' => PostController::class,
// ]);
// Route::apiResource('posts', PostController::class)->readOnly();

// use App\Http\Controllers\PhotoController;
// use App\Http\Controllers\PostController;

// Route::apiResources([
//     'photos' => PhotoController::class,
//     'posts' => PostController::class,
// ]);

// Route::apiResource('assets', AssetController::class)->except;
// Route::apiResource('assets', AssetController::class); -> vulns
// Route::apiResource('assets', AssetController::class); -> devices
// Route::apiResource('assets', AssetController::class); -> gateways
// Route::apiResource('assets', AssetController::class); -> user ??
// Route::apiResource('assets', AssetController::class); -> topology ??

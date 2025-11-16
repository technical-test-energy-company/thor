<?php

namespace App\Device;

use Illuminate\Support\Facades\Route;

Route::get('devices', [DeviceController::class, 'index']);
Route::get('devices/{device}', [DeviceController::class, 'show']);

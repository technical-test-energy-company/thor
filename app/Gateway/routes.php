<?php

namespace App\Gateway;

use Illuminate\Support\Facades\Route;

Route::get('gateways', [GatewayController::class, 'index']);
Route::get('gateways/{gateway}', [GatewayController::class, 'show']);

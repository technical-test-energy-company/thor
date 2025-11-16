<?php

namespace App\Topology;

use Illuminate\Support\Facades\Route;

Route::get('topology', [TopologyController::class, 'index']);

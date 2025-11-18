<?php

namespace App\User;

use Illuminate\Support\Facades\Route;

Route::post('login', [LoginController::class, 'authenticate']);

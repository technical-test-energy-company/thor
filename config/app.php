<?php

return [

    'name' => 'thor',
    'env' => env('APP_ENV', 'production'),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => 'UTC',
    'locale' => 'en',
    'cipher' => 'AES-256-CBC',
    'key' => env('APP_KEY'),

];

<?php

return [

    'driver' => 'database',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => storage_path('framework/sessions'),
    'connection' => 'pgsql',
    'table' => 'sessions',
    'store' => null,
    'lottery' => [2, 100],
    'cookie' => 'thor-session',
    'path' => '/',
    'domain' => null,
    'secure' => env('SESSION_SECURE_COOKIE'),
    'http_only' => true,
    'same_site' => env('SESSION_SAME_SITE', 'lax'),
    'partitioned' => false,

];

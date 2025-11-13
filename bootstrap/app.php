<?php

use App\Exceptions\ExceptionHandler;
use App\Http\Middleware\ForceAcceptJsonHeader;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        apiPrefix: '',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->prepend([
            ForceAcceptJsonHeader::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        ExceptionHandler::handle($exceptions);
    })->create();

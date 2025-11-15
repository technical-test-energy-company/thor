<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Infrastructure\Exceptions\ExceptionHandler;
use Infrastructure\Http\Middleware\ForceAcceptJsonHeader;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
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

<?php

namespace Infrastructure\Exceptions;

use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ExceptionHandler
{
    private const EXCEPTION_MESSAGE = 'exception_message';

    public static function handle(Exceptions $exceptions): void
    {
        $exceptions->render(function (Throwable $e, Request $request): void {
            $request->attributes->set(self::EXCEPTION_MESSAGE, $e->getMessage());
        });

        $exceptions->respond(function (Response $response): Response {
            $request = request();
            $message = $request->attributes->get(self::EXCEPTION_MESSAGE);

            if (! is_null($message)) {
                return response()->json(['message' => $message], $response->getStatusCode());
            }

            return $response;
        });
    }
}

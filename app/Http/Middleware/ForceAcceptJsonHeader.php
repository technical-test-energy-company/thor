<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceAcceptJsonHeader
{
    private const HEADER_KEY = 'Accept';

    private const HEADER_VALUE = 'application/json';

    public function handle(Request $request, Closure $next): Response
    {
        $request->headers->set(self::HEADER_KEY, self::HEADER_VALUE);

        return $next($request);
    }
}

<?php

namespace App\Gateway;

use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Http\Controllers\Controller;

class GatewayController extends Controller
{
    /**
     * List all available Gateways.
     */
    public function index(): Collection
    {
        $response = Gateway::all();

        return $response;
    }

    /**
     * Retrieve a Gateway.
     */
    public function show(Gateway $gateway): Gateway
    {
        return $gateway;
    }
}

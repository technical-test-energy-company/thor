<?php

namespace App\Device;

use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Http\Controllers\Controller;

class DeviceController extends Controller
{
    /**
     * List all available Devices.
     */
    public function index(): Collection
    {
        $response = Device::all();

        return $response;
    }

    /**
     * Retrieve a Device.
     */
    public function show(Device $device): Device
    {
        return $device;
    }
}

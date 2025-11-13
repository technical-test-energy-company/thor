<?php

namespace App\Enums\Asset;

enum AssetDeviceType: string
{
    case Router = 'router';
    case Switch = 'switch';
    case Server = 'server';
    case Sensor = 'sensor';
    case PLC = 'plc';
    case HMI = 'hmi';
}

<?php

namespace App\Asset\Enums;

enum AssetStatus: string
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Suspended = 'suspended';
}

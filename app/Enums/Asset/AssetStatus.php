<?php

namespace App\Enums\Asset;

enum AssetStatus: string
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Suspended = 'suspended';
}

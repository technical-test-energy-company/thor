<?php

namespace App\Asset\Enums;

enum AssetRisk: string
{
    case Low = 'low';
    case Medium = 'medium';
    case High = 'high';
    case Critical = 'critical';
}

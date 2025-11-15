<?php

namespace Infrastructure\Enums;

enum RiskSeverity: string
{
    case Low = 'low';
    case Medium = 'medium';
    case High = 'high';
    case Critical = 'critical';
}

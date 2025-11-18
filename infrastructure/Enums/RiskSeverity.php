<?php

namespace Infrastructure\Enums;

enum RiskSeverity: string
{
    case Low = 'low';
    case Medium = 'medium';
    case High = 'high';
    case Critical = 'critical';

    public const WEIGHTS = [
        self::Low->value => 1,
        self::Medium->value => 2,
        self::High->value => 3,
        self::Critical->value => 4,
    ];

    public const SCORE_NORMALIZATION_DIVISOR = 10;

    public const LOW_MIN_VALUE = 0.0;

    public const MEDIUM_MIN_VALUE = 0.3;

    public const HIGH_MIN_VALUE = 0.6;

    public const CRITICAL_MIN_VALUE = 0.8;

    public static function fromRiskScore(float $riskScore): RiskSeverity
    {
        if ($riskScore > RiskSeverity::CRITICAL_MIN_VALUE) {
            return RiskSeverity::Critical;
        }

        if ($riskScore > RiskSeverity::HIGH_MIN_VALUE) {
            return RiskSeverity::High;
        }

        if ($riskScore > RiskSeverity::MEDIUM_MIN_VALUE) {
            return RiskSeverity::Medium;
        }

        return RiskSeverity::Low;
    }
}

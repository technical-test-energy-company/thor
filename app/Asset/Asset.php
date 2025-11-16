<?php

namespace App\Asset;

use App\Asset\Enums\AssetDeviceType;
use App\Asset\Enums\AssetStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Infrastructure\Constants\Constants;
use Infrastructure\Enums\RiskSeverity;
use Infrastructure\Model\BaseModel;

class Asset extends BaseModel
{
    use HasFactory;

    public const FOREIGN_ID = 'assetId';

    private const ID_PREFIX = 's';

    protected $fillable = [
        Constants::PUBLIC_ID,
        'name',
        'description',
        'device_type',
        'ip_address',
        'location',
        'status',
        'supplier',
        'risk',
        'risk_score',
    ];

    protected $casts = [
        'device_type' => AssetDeviceType::class,
        'status' => AssetStatus::class,
        'risk' => RiskSeverity::class,
        'risk_score' => 'float',
    ];

    public function getRouteKeyName(): string
    {
        return Constants::PUBLIC_ID;
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($asset): void {
            $asset->uid = Str::uuid();
        });

        static::created(function ($asset): void {
            $asset->uid = self::ID_PREFIX.$asset->id;
            $asset->saveQuietly();
        });
    }
}

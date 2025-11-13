<?php

namespace App\Asset;

use App\Asset\Enums\AssetDeviceType;
use App\Asset\Enums\AssetRisk;
use App\Asset\Enums\AssetStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Asset extends Model
{
    private const ID_PREFIX = 's';

    public const ROUTE_KEY = 'uid';

    protected $fillable = [
        'uid',
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
        'risk' => AssetRisk::class,
        'risk_score' => 'float',
    ];

    public function getRouteKeyName(): string
    {
        return self::ROUTE_KEY;
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($asset) {
            $asset->uid = Str::uuid();
        });

        static::created(function ($asset) {
            $asset->uid = self::ID_PREFIX.$asset->id;
            $asset->saveQuietly();
        });
    }
}

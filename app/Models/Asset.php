<?php

namespace App\Models;

use App\Enums\Asset\AssetDeviceType;
use App\Enums\Asset\AssetRisk;
use App\Enums\Asset\AssetStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Asset extends Model
{
    private const ID_PREFIX = 's';

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

    protected static function boot()
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

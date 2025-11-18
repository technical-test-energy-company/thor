<?php

namespace Database\Factories\Asset;

use App\Asset\Asset;
use App\Asset\Enums\AssetDeviceType;
use App\Asset\Enums\AssetStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Infrastructure\Constants\Constants;
use Infrastructure\Enums\RiskSeverity;

class AssetFactory extends Factory
{
    protected $model = Asset::class;

    public function definition(): array
    {
        return [
            Constants::PUBLIC_ID => Asset::ID_PREFIX.fake()->numberBetween(1, 100),
            'name' => fake()->word(),
            'description' => fake()->text(),
            'device_type' => fake()->randomElement(AssetDeviceType::cases()),
            'ip_address' => fake()->ipv4(),
            'location' => fake()->countryCode(),
            'status' => fake()->randomElement(AssetStatus::cases()),
            'supplier' => fake()->company(),
            'risk' => fake()->randomElement(RiskSeverity::cases()),
            'risk_score' => fakeRiskScore(),
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Asset\Asset;
use App\Asset\Enums\AssetDeviceType;
use App\Asset\Enums\AssetStatus;
use Illuminate\Database\Seeder;
use Infrastructure\Enums\RiskSeverity;

class AssetSeeder extends Seeder
{
    public function run(): void
    {
        $entries = [
            ['name' => 'Alpha',    'description' => fake()->text(), 'device_type' => AssetDeviceType::Router, 'ip_address' => fake()->ipv4(), 'location' => 'BR', 'status' => AssetStatus::Active,    'supplier' => 'Acme',       'risk' => RiskSeverity::High,     'risk_score' => 0.68],
            ['name' => 'Bravo',    'description' => fake()->text(), 'device_type' => AssetDeviceType::Switch, 'ip_address' => fake()->ipv4(), 'location' => 'AT', 'status' => AssetStatus::Active,    'supplier' => 'Borealis',   'risk' => RiskSeverity::Medium,   'risk_score' => 0.45],
            ['name' => 'Charlie',  'description' => fake()->text(), 'device_type' => AssetDeviceType::Server, 'ip_address' => fake()->ipv4(), 'location' => 'CA', 'status' => AssetStatus::Active,    'supplier' => 'CyberCore',  'risk' => RiskSeverity::Low,      'risk_score' => 0.22],
            ['name' => 'Delta',    'description' => fake()->text(), 'device_type' => AssetDeviceType::Sensor, 'ip_address' => fake()->ipv4(), 'location' => 'EG', 'status' => AssetStatus::Active,    'supplier' => 'DeltaWorks', 'risk' => RiskSeverity::Critical, 'risk_score' => 0.92],
            ['name' => 'Echo',     'description' => fake()->text(), 'device_type' => AssetDeviceType::PLC,    'ip_address' => fake()->ipv4(), 'location' => 'DK', 'status' => AssetStatus::Active,    'supplier' => 'EverGreen',  'risk' => RiskSeverity::Medium,   'risk_score' => 0.51],
            ['name' => 'Foxtrot',  'description' => fake()->text(), 'device_type' => AssetDeviceType::HMI,    'ip_address' => fake()->ipv4(), 'location' => 'FR', 'status' => AssetStatus::Active,    'supplier' => 'Acme',       'risk' => RiskSeverity::Low,      'risk_score' => 0.18],
            ['name' => 'Golf',     'description' => fake()->text(), 'device_type' => AssetDeviceType::Router, 'ip_address' => fake()->ipv4(), 'location' => 'DE', 'status' => AssetStatus::Active,    'supplier' => 'Borealis',   'risk' => RiskSeverity::High,     'risk_score' => 0.74],
            ['name' => 'Hotel',    'description' => fake()->text(), 'device_type' => AssetDeviceType::Switch, 'ip_address' => fake()->ipv4(), 'location' => 'ES', 'status' => AssetStatus::Inactive,  'supplier' => 'CyberCore',  'risk' => RiskSeverity::Medium,   'risk_score' => 0.49],
            ['name' => 'India',    'description' => fake()->text(), 'device_type' => AssetDeviceType::Server, 'ip_address' => fake()->ipv4(), 'location' => 'IN', 'status' => AssetStatus::Inactive,  'supplier' => 'DeltaWorks', 'risk' => RiskSeverity::Critical, 'risk_score' => 0.89],
            ['name' => 'Juliet',   'description' => fake()->text(), 'device_type' => AssetDeviceType::Sensor, 'ip_address' => fake()->ipv4(), 'location' => 'IT', 'status' => AssetStatus::Inactive,  'supplier' => 'EverGreen',  'risk' => RiskSeverity::Low,      'risk_score' => 0.27],
            ['name' => 'Kilo',     'description' => fake()->text(), 'device_type' => AssetDeviceType::PLC,    'ip_address' => fake()->ipv4(), 'location' => 'JP', 'status' => AssetStatus::Inactive,  'supplier' => 'Acme',       'risk' => RiskSeverity::Medium,   'risk_score' => 0.53],
            ['name' => 'Lima',     'description' => fake()->text(), 'device_type' => AssetDeviceType::HMI,    'ip_address' => fake()->ipv4(), 'location' => 'MX', 'status' => AssetStatus::Inactive,  'supplier' => 'Borealis',   'risk' => RiskSeverity::Low,      'risk_score' => 0.24],
            ['name' => 'Mike',     'description' => fake()->text(), 'device_type' => AssetDeviceType::Router, 'ip_address' => fake()->ipv4(), 'location' => 'NL', 'status' => AssetStatus::Inactive,  'supplier' => 'CyberCore',  'risk' => RiskSeverity::High,     'risk_score' => 0.77],
            ['name' => 'November', 'description' => fake()->text(), 'device_type' => AssetDeviceType::Switch, 'ip_address' => fake()->ipv4(), 'location' => 'NO', 'status' => AssetStatus::Inactive,  'supplier' => 'DeltaWorks', 'risk' => RiskSeverity::Critical, 'risk_score' => 0.94],
            ['name' => 'Oscar',    'description' => fake()->text(), 'device_type' => AssetDeviceType::Server, 'ip_address' => fake()->ipv4(), 'location' => 'PL', 'status' => AssetStatus::Suspended, 'supplier' => 'EverGreen',  'risk' => RiskSeverity::Medium,   'risk_score' => 0.48],
            ['name' => 'Papa',     'description' => fake()->text(), 'device_type' => AssetDeviceType::Sensor, 'ip_address' => fake()->ipv4(), 'location' => 'PT', 'status' => AssetStatus::Suspended, 'supplier' => 'Acme',       'risk' => RiskSeverity::High,     'risk_score' => 0.69],
            ['name' => 'Quebec',   'description' => fake()->text(), 'device_type' => AssetDeviceType::PLC,    'ip_address' => fake()->ipv4(), 'location' => 'CA', 'status' => AssetStatus::Suspended, 'supplier' => 'Borealis',   'risk' => RiskSeverity::Low,      'risk_score' => 0.21],
            ['name' => 'Romeo',    'description' => fake()->text(), 'device_type' => AssetDeviceType::HMI,    'ip_address' => fake()->ipv4(), 'location' => 'RO', 'status' => AssetStatus::Suspended, 'supplier' => 'CyberCore',  'risk' => RiskSeverity::Medium,   'risk_score' => 0.46],
            ['name' => 'Sierra',   'description' => fake()->text(), 'device_type' => AssetDeviceType::Router, 'ip_address' => fake()->ipv4(), 'location' => 'SE', 'status' => AssetStatus::Suspended, 'supplier' => 'DeltaWorks', 'risk' => RiskSeverity::High,     'risk_score' => 0.73],
            ['name' => 'Tango',    'description' => fake()->text(), 'device_type' => AssetDeviceType::Switch, 'ip_address' => fake()->ipv4(), 'location' => 'TR', 'status' => AssetStatus::Suspended, 'supplier' => 'EverGreen',  'risk' => RiskSeverity::Low,      'risk_score' => 0.29],
        ];

        foreach ($entries as $entry) {
            Asset::create($entry);
        }
    }
}

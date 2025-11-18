<?php

namespace Database\Seeders;

use Database\Seeders\Asset\AssetSeeder;
use Database\Seeders\Device\DeviceSeeder;
use Database\Seeders\Gateway\GatewaySeeder;
use Database\Seeders\Topology\TopologyEdgeSeeder;
use Database\Seeders\Topology\TopologyNodeSeeder;
use Database\Seeders\Vulnerability\VulnerabilitySeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (! app()->environment('production')) {
            $this->call([
                AssetSeeder::class,
                VulnerabilitySeeder::class,
                GatewaySeeder::class,
                DeviceSeeder::class,
                TopologyEdgeSeeder::class,
                TopologyNodeSeeder::class,
            ]);
        }
    }
}

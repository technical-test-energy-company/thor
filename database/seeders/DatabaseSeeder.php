<?php

namespace Database\Seeders;

use Database\Seeders\Asset\AssetSeeder;
use Database\Seeders\Topology\TopologyEdgeSeeder;
use Database\Seeders\Topology\TopologyNodeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AssetSeeder::class,
            TopologyEdgeSeeder::class,
            TopologyNodeSeeder::class,
        ]);
    }
}

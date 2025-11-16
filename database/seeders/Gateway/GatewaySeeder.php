<?php

namespace Database\Seeders\Gateway;

use App\Gateway\Gateway;
use Illuminate\Database\Seeder;

class GatewaySeeder extends Seeder
{
    public function run(): void
    {
        $entries = [
            ['id' => 'g1',  'assetId' => 's1',  'name' => 'GW-Alpha-1'],
            ['id' => 'g2',  'assetId' => 's2',  'name' => 'GW-Bravo-1'],
            ['id' => 'g3',  'assetId' => 's3',  'name' => 'GW-Charlie-1'],
            ['id' => 'g4',  'assetId' => 's4',  'name' => 'GW-Delta-1'],
            ['id' => 'g5',  'assetId' => 's5',  'name' => 'GW-Echo-1'],
            ['id' => 'g6',  'assetId' => 's6',  'name' => 'GW-Foxtrot-1'],
            ['id' => 'g7',  'assetId' => 's7',  'name' => 'GW-Golf-1'],
            ['id' => 'g8',  'assetId' => 's8',  'name' => 'GW-Hotel-1'],
            ['id' => 'g9',  'assetId' => 's9',  'name' => 'GW-India-1'],
            ['id' => 'g10', 'assetId' => 's10', 'name' => 'GW-Juliet-1'],
            ['id' => 'g11', 'assetId' => 's11', 'name' => 'GW-Kilo-1'],
            ['id' => 'g12', 'assetId' => 's12', 'name' => 'GW-Lima-1'],
            ['id' => 'g13', 'assetId' => 's13', 'name' => 'GW-Mike-1'],
            ['id' => 'g14', 'assetId' => 's14', 'name' => 'GW-November-1'],
            ['id' => 'g15', 'assetId' => 's15', 'name' => 'GW-Oscar-1'],
            ['id' => 'g16', 'assetId' => 's16', 'name' => 'GW-Papa-1'],
            ['id' => 'g17', 'assetId' => 's17', 'name' => 'GW-Quebec-1'],
            ['id' => 'g18', 'assetId' => 's18', 'name' => 'GW-Romeo-1'],
            ['id' => 'g19', 'assetId' => 's19', 'name' => 'GW-Sierra-1'],
            ['id' => 'g20', 'assetId' => 's20', 'name' => 'GW-Tango-1'],
        ];

        foreach ($entries as $entry) {
            Gateway::create($entry);
        }
    }
}

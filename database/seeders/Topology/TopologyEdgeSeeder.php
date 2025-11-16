<?php

namespace Database\Seeders\Topology;

use App\Topology\Model\TopologyEdge;
use Illuminate\Database\Seeder;

class TopologyEdgeSeeder extends Seeder
{
    public function run(): void
    {
        $entries = [
            ['type' => 'edge', 'id' => 'e-s1-g1',   'source' => 's1',  'target' => 'g1'],
            ['type' => 'edge', 'id' => 'e-s2-g2',   'source' => 's2',  'target' => 'g2'],
            ['type' => 'edge', 'id' => 'e-s3-g3',   'source' => 's3',  'target' => 'g3'],
            ['type' => 'edge', 'id' => 'e-s4-g4',   'source' => 's4',  'target' => 'g4'],
            ['type' => 'edge', 'id' => 'e-s5-g5',   'source' => 's5',  'target' => 'g5'],
            ['type' => 'edge', 'id' => 'e-s6-g6',   'source' => 's6',  'target' => 'g6'],
            ['type' => 'edge', 'id' => 'e-s7-g7',   'source' => 's7',  'target' => 'g7'],
            ['type' => 'edge', 'id' => 'e-s8-g8',   'source' => 's8',  'target' => 'g8'],
            ['type' => 'edge', 'id' => 'e-s9-g9',   'source' => 's9',  'target' => 'g9'],
            ['type' => 'edge', 'id' => 'e-s10-g10', 'source' => 's10', 'target' => 'g10'],
            ['type' => 'edge', 'id' => 'e-s11-g11', 'source' => 's11', 'target' => 'g11'],
            ['type' => 'edge', 'id' => 'e-s12-g12', 'source' => 's12', 'target' => 'g12'],
            ['type' => 'edge', 'id' => 'e-s13-g13', 'source' => 's13', 'target' => 'g13'],
            ['type' => 'edge', 'id' => 'e-s14-g14', 'source' => 's14', 'target' => 'g14'],
            ['type' => 'edge', 'id' => 'e-s15-g15', 'source' => 's15', 'target' => 'g15'],
            ['type' => 'edge', 'id' => 'e-s16-g16', 'source' => 's16', 'target' => 'g16'],
            ['type' => 'edge', 'id' => 'e-s17-g17', 'source' => 's17', 'target' => 'g17'],
            ['type' => 'edge', 'id' => 'e-s18-g18', 'source' => 's18', 'target' => 'g18'],
            ['type' => 'edge', 'id' => 'e-s19-g19', 'source' => 's19', 'target' => 'g19'],
            ['type' => 'edge', 'id' => 'e-s20-g20', 'source' => 's20', 'target' => 'g20'],
            ['type' => 'edge', 'id' => 'e-g1-d1',   'source' => 'g1',  'target' => 'd1'],
            ['type' => 'edge', 'id' => 'e-g2-d2',   'source' => 'g2',  'target' => 'd2'],
            ['type' => 'edge', 'id' => 'e-g3-d3',   'source' => 'g3',  'target' => 'd3'],
            ['type' => 'edge', 'id' => 'e-g4-d4',   'source' => 'g4',  'target' => 'd4'],
            ['type' => 'edge', 'id' => 'e-g5-d5',   'source' => 'g5',  'target' => 'd5'],
            ['type' => 'edge', 'id' => 'e-g6-d6',   'source' => 'g6',  'target' => 'd6'],
            ['type' => 'edge', 'id' => 'e-g7-d7',   'source' => 'g7',  'target' => 'd7'],
            ['type' => 'edge', 'id' => 'e-g8-d8',   'source' => 'g8',  'target' => 'd8'],
            ['type' => 'edge', 'id' => 'e-g9-d9',   'source' => 'g9',  'target' => 'd9'],
            ['type' => 'edge', 'id' => 'e-g10-d10', 'source' => 'g10', 'target' => 'd10'],
            ['type' => 'edge', 'id' => 'e-g11-d11', 'source' => 'g11', 'target' => 'd11'],
            ['type' => 'edge', 'id' => 'e-g12-d12', 'source' => 'g12', 'target' => 'd12'],
            ['type' => 'edge', 'id' => 'e-g13-d13', 'source' => 'g13', 'target' => 'd13'],
            ['type' => 'edge', 'id' => 'e-g14-d14', 'source' => 'g14', 'target' => 'd14'],
            ['type' => 'edge', 'id' => 'e-g15-d15', 'source' => 'g15', 'target' => 'd15'],
            ['type' => 'edge', 'id' => 'e-g16-d16', 'source' => 'g16', 'target' => 'd16'],
            ['type' => 'edge', 'id' => 'e-g17-d17', 'source' => 'g17', 'target' => 'd17'],
            ['type' => 'edge', 'id' => 'e-g18-d18', 'source' => 'g18', 'target' => 'd18'],
            ['type' => 'edge', 'id' => 'e-g19-d19', 'source' => 'g19', 'target' => 'd19'],
            ['type' => 'edge', 'id' => 'e-g20-d20', 'source' => 'g20', 'target' => 'd20'],
        ];

        foreach ($entries as $entry) {
            TopologyEdge::create($entry);
        }
    }
}

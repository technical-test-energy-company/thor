<?php

namespace Database\Seeders\Topology;

use App\Topology\Model\TopologyNode;
use Illuminate\Database\Seeder;

class TopologyNodeSeeder extends Seeder
{
    public function run(): void
    {
        $entries = [
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's1',  'label' => 'Alpha'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's2',  'label' => 'Bravo'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's3',  'label' => 'Charlie'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's4',  'label' => 'Delta'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's5',  'label' => 'Echo'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's6',  'label' => 'Foxtrot'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's7',  'label' => 'Golf'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's8',  'label' => 'Hotel'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's9',  'label' => 'India'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's10', 'label' => 'Juliet'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's11', 'label' => 'Kilo'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's12', 'label' => 'Lima'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's13', 'label' => 'Mike'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's14', 'label' => 'November'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's15', 'label' => 'Oscar'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's16', 'label' => 'Papa'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's17', 'label' => 'Quebec'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's18', 'label' => 'Romeo'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's19', 'label' => 'Sierra'],
            ['type' => 'node', 'nodeType' => 'site',    'id' => 's20', 'label' => 'Tango'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g1',  'label' => 'GW-Alpha-1',   'parentId' => 's1'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g2',  'label' => 'GW-Bravo-1',   'parentId' => 's2'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g3',  'label' => 'GW-Charlie-1', 'parentId' => 's3'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g4',  'label' => 'GW-Delta-1',   'parentId' => 's4'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g5',  'label' => 'GW-Echo-1',    'parentId' => 's5'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g6',  'label' => 'GW-Foxtrot-1', 'parentId' => 's6'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g7',  'label' => 'GW-Golf-1',    'parentId' => 's7'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g8',  'label' => 'GW-Hotel-1',   'parentId' => 's8'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g9',  'label' => 'GW-India-1',   'parentId' => 's9'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g10', 'label' => 'GW-Juliet-1',  'parentId' => 's10'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g11', 'label' => 'GW-Kilo-1',    'parentId' => 's11'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g12', 'label' => 'GW-Lima-1',    'parentId' => 's12'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g13', 'label' => 'GW-Mike-1',    'parentId' => 's13'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g14', 'label' => 'GW-November-1', 'parentId' => 's14'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g15', 'label' => 'GW-Oscar-1',   'parentId' => 's15'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g16', 'label' => 'GW-Papa-1',    'parentId' => 's16'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g17', 'label' => 'GW-Quebec-1',  'parentId' => 's17'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g18', 'label' => 'GW-Romeo-1',   'parentId' => 's18'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g19', 'label' => 'GW-Sierra-1',  'parentId' => 's19'],
            ['type' => 'node', 'nodeType' => 'gateway', 'id' => 'g20', 'label' => 'GW-Tango-1',   'parentId' => 's20'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd1',  'label' => 'PLC-A1',       'parentId' => 'g1'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd2',  'label' => 'Sensor-B1',    'parentId' => 'g2'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd3',  'label' => 'HMI-C1',       'parentId' => 'g3'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd4',  'label' => 'PLC-D1',       'parentId' => 'g4'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd5',  'label' => 'Sensor-E1',    'parentId' => 'g5'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd6',  'label' => 'HMI-F1',       'parentId' => 'g6'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd7',  'label' => 'PLC-G1',       'parentId' => 'g7'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd8',  'label' => 'Sensor-H1',    'parentId' => 'g8'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd9',  'label' => 'HMI-I1',       'parentId' => 'g9'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd10', 'label' => 'PLC-J1',       'parentId' => 'g10'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd11', 'label' => 'Sensor-K1',    'parentId' => 'g11'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd12', 'label' => 'HMI-L1',       'parentId' => 'g12'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd13', 'label' => 'PLC-M1',       'parentId' => 'g13'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd14', 'label' => 'Sensor-N1',    'parentId' => 'g14'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd15', 'label' => 'HMI-O1',       'parentId' => 'g15'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd16', 'label' => 'PLC-P1',       'parentId' => 'g16'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd17', 'label' => 'Sensor-Q1',    'parentId' => 'g17'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd18', 'label' => 'HMI-R1',       'parentId' => 'g18'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd19', 'label' => 'PLC-S1',       'parentId' => 'g19'],
            ['type' => 'node', 'nodeType' => 'device',  'id' => 'd20', 'label' => 'Sensor-T1',    'parentId' => 'g20'],
        ];

        foreach ($entries as $entry) {
            TopologyNode::create($entry);
        }
    }
}

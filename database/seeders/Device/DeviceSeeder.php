<?php

namespace Database\Seeders\Device;

use App\Device\Device;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    public function run(): void
    {
        $entries = [
            [ 'id' => 'd1',  'assetId' => 's1',  'gatewayId' => 'g1',  'name' => 'PLC-A1',   'type' => 'plc' ],
            [ 'id' => 'd2',  'assetId' => 's2',  'gatewayId' => 'g2',  'name' => 'Sensor-B1','type' => 'sensor' ],
            [ 'id' => 'd3',  'assetId' => 's3',  'gatewayId' => 'g3',  'name' => 'HMI-C1',   'type' => 'hmi' ],
            [ 'id' => 'd4',  'assetId' => 's4',  'gatewayId' => 'g4',  'name' => 'PLC-D1',   'type' => 'plc' ],
            [ 'id' => 'd5',  'assetId' => 's5',  'gatewayId' => 'g5',  'name' => 'Sensor-E1','type' => 'sensor' ],
            [ 'id' => 'd6',  'assetId' => 's6',  'gatewayId' => 'g6',  'name' => 'HMI-F1',   'type' => 'hmi' ],
            [ 'id' => 'd7',  'assetId' => 's7',  'gatewayId' => 'g7',  'name' => 'PLC-G1',   'type' => 'plc' ],
            [ 'id' => 'd8',  'assetId' => 's8',  'gatewayId' => 'g8',  'name' => 'Sensor-H1','type' => 'sensor' ],
            [ 'id' => 'd9',  'assetId' => 's9',  'gatewayId' => 'g9',  'name' => 'HMI-I1',   'type' => 'hmi' ],
            [ 'id' => 'd10', 'assetId' => 's10', 'gatewayId' => 'g10', 'name' => 'PLC-J1',   'type' => 'plc' ],
            [ 'id' => 'd11', 'assetId' => 's11', 'gatewayId' => 'g11', 'name' => 'Sensor-K1','type' => 'sensor' ],
            [ 'id' => 'd12', 'assetId' => 's12', 'gatewayId' => 'g12', 'name' => 'HMI-L1',   'type' => 'hmi' ],
            [ 'id' => 'd13', 'assetId' => 's13', 'gatewayId' => 'g13', 'name' => 'PLC-M1',   'type' => 'plc' ],
            [ 'id' => 'd14', 'assetId' => 's14', 'gatewayId' => 'g14', 'name' => 'Sensor-N1','type' => 'sensor' ],
            [ 'id' => 'd15', 'assetId' => 's15', 'gatewayId' => 'g15', 'name' => 'HMI-O1',   'type' => 'hmi' ],
            [ 'id' => 'd16', 'assetId' => 's16', 'gatewayId' => 'g16', 'name' => 'PLC-P1',   'type' => 'plc' ],
            [ 'id' => 'd17', 'assetId' => 's17', 'gatewayId' => 'g17', 'name' => 'Sensor-Q1','type' => 'sensor' ],
            [ 'id' => 'd18', 'assetId' => 's18', 'gatewayId' => 'g18', 'name' => 'HMI-R1',   'type' => 'hmi' ],
            [ 'id' => 'd19', 'assetId' => 's19', 'gatewayId' => 'g19', 'name' => 'PLC-S1',   'type' => 'plc' ],
            [ 'id' => 'd20', 'assetId' => 's20', 'gatewayId' => 'g20', 'name' => 'Sensor-T1','type' => 'sensor' ],
        ];

        foreach ($entries as $entry) {
            Device::create($entry);
        }
    }
}

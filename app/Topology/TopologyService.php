<?php

namespace App\Topology;

use App\Topology\Model\TopologyEdge;
use App\Topology\Model\TopologyNode;

class TopologyService
{
    public function index(): array
    {
        $edges = TopologyEdge::all();
        $nodes = TopologyNode::all();

        $response = [
            'topology' => [
                'edges' => $edges,
                'nodes' => $nodes,
            ],
        ];

        return $response;
    }
}

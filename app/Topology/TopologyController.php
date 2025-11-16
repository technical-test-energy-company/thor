<?php

namespace App\Topology;

use App\Topology\Model\TopologyEdge;
use App\Topology\Model\TopologyNode;
use Infrastructure\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class TopologyController extends Controller
{
    private TopologyService $topologyService;

    public function __construct(TopologyService $topologyService)
    {
        $this->topologyService = $topologyService;
    }

    /**
     * List the current Topology of Assets.
     *
     * @response array{topology: array{edges: TopologyEdge[], nodes: TopologyNode[]}}
     */
    public function index(): Response
    {
        $response = $this->topologyService->index();

        return response($response);
    }
}

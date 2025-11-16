<?php

namespace App\Topology\Model;

use Infrastructure\Model\ReadOnlyModel;

class TopologyNode extends ReadOnlyModel
{
    public const TABLE_NAME = 'topology_nodes';

    public function toArray()
    {
        $data = parent::toArray();

        if (is_null($this->parentId)) {
            unset($data['parentId']);
        }

        return $data;
    }
}

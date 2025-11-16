<?php

namespace App\Topology\Model;

use Infrastructure\Model\ReadOnlyModel;

class TopologyNode extends ReadOnlyModel
{
    public function toArray()
    {
        $data = parent::toArray();

        if (is_null($this->parentId)) {
            unset($data['parentId']);
        }

        return $data;
    }
}

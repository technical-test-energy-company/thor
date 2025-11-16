<?php

namespace App\Topology\Model;

use Illuminate\Database\Eloquent\Model;

class TopologyNode extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $keyType = 'string';

    public function toArray()
    {
        $data = parent::toArray();

        if (is_null($this->parentId)) {
            unset($data['parentId']);
        }

        return $data;
    }
}

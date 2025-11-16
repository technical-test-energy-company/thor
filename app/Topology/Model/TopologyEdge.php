<?php

namespace App\Topology\Model;

use Illuminate\Database\Eloquent\Model;

class TopologyEdge extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $keyType = 'string';
}

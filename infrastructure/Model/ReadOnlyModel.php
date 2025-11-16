<?php

namespace Infrastructure\Model;

use Illuminate\Database\Eloquent\Model;

class ReadOnlyModel extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $keyType = 'string';
}

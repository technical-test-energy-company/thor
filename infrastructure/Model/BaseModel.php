<?php

namespace Infrastructure\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Infrastructure\Constants\Constants;

class BaseModel extends Model
{
    use SoftDeletes;

    protected $hidden = [
        Constants::ID,
        Constants::CREATED_AT,
        Constants::UPDATED_AT,
        Constants::DELETED_AT,
    ];
}

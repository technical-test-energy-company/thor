<?php

namespace Infrastructure\Model;

use Illuminate\Database\Eloquent\Model;
use Infrastructure\Constants\Constants;

class BaseModel extends Model
{
    protected const ROUTE_KEY = 'uid';

    protected $hidden = [
        Constants::ID,
        Constants::CREATED_AT,
        Constants::UPDATED_AT,
        Constants::DELETED_AT,
    ];
}

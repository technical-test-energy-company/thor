<?php

namespace App\Gateway;

use Infrastructure\Model\ReadOnlyModel;

class Gateway extends ReadOnlyModel
{
    public const FOREIGN_ID = 'gatewayId';

    public const TABLE_NAME = 'gateways';
}

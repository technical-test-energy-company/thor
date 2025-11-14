<?php

namespace Infrastructure\Enums;

enum HttpStatusCode: int
{
    case Created = 201;

    public function toInt(): int
    {
        return $this->value;
    }
}

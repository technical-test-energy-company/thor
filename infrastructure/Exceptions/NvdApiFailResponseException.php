<?php

namespace Infrastructure\Exceptions;

use Exception;

class NvdApiFailResponseException extends Exception
{
    public function __construct(
        string $cveId,
    ) {
        $message = "Unable to fetch vulnerability information for $cveId";
        parent::__construct($message);
    }
}

<?php

namespace Infrastructure\Exceptions\NvdExternalApi;

use Exception;

class NvdApiMissingFieldsException extends Exception
{
    public function __construct(
        string $cveId,
        array $data = [],
    ) {
        $message = "Unable to fetch vulnerability information for $cveId";

        if (! empty($data)) {
            $missingList = implode(', ', $data);
            $message .= " | Missing fields: {$missingList}";
        }

        parent::__construct($message);
    }
}

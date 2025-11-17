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

        $missing = array_keys(
            array_filter($data, fn ($value) => is_null($value))
        );

        if (! empty($missing)) {
            $missingList = implode(', ', $missing);
            $message .= " | Missing fields: {$missingList}";
        }

        parent::__construct($message);
    }
}

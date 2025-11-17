<?php

namespace Infrastructure\Exceptions\NvdExternalApi;

use Exception;

class NvdApiNoResultsException extends Exception
{
    public function __construct(
        string $cveId,
        array $response = [],
    ) {
        $message = "Unable to fetch vulnerability information for $cveId";

        if (! empty($response)) {
            $json = json_encode($response);
            $message .= " | Response: {$json}";
        }

        parent::__construct($message);
    }
}

<?php

namespace Infrastructure\Logging;

use Illuminate\Log\Logger;
use Monolog\LogRecord;

class CustomizeOutputFormatter
{
    public function __invoke(Logger $logger): void
    {
        $appName = config('app.name');

        foreach ($logger->getHandlers() as $handler) {
            $handler->pushProcessor(function (LogRecord $record) use ($appName): LogRecord {
                $context = $this->getTraceContext();

                $record['extra']['app'] = $appName;
                $record['extra']['dd'] = [
                    'trace_id' => $context['trace_id'] ?? null,
                    'span_id' => $context['span_id'] ?? null,
                ];

                return $record;
            });
        }
    }

    private function getTraceContext(): array
    {
        if (! extension_loaded('ddtrace')) {
            return [];
        }

        return \DDTrace\current_context();
    }
}

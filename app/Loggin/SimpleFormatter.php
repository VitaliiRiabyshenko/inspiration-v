<?php

namespace App\Loggin;

use Monolog\Formatter\LineFormatter;

class SimpleFormatter
{
    public function __invoke($logger)
    {
        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter(
                new LineFormatter('[%datetime%]: %message% %context%'."\n")
            );
        }
    }
}
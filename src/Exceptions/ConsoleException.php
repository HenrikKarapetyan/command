<?php

namespace Henrik\Console\Exceptions;

use Exception;
use Throwable;

class ConsoleException extends Exception
{
    public function __construct(string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
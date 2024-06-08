<?php

namespace Henrik\Console\Exceptions;

use Throwable;

class CommandNotFoundException extends ConsoleException
{
    public function __construct(string $command, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct(sprintf('The command `%s` not found!', $command), $code, $previous);
    }
}
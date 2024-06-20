<?php

namespace Henrik\Console\Tests\Services;

class SampleService
{
    public function show(string $name): void
    {
        echo sprintf("Hello %s \n", $name);
    }
}
<?php

namespace Hk\Command\ConsoleComponent\Attrributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class AsCommand
{
    public function __construct(
        public string $name,
        public ?string $description = null
    ) {}
}
<?php

declare (strict_types = 1);

abstract class StringValueObject
{
    public function __construct(protected string $value)
    {}

    final public function value(): string
    {
        return $this->value;
    }
}

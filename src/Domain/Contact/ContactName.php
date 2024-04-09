<?php

declare (strict_types = 1);

final class ContactName extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->isValid($value);
    }

    private function isValid(string $value): void
    {
        if (strlen($value) < 2) {
            throw new ErrorDomain("El nombre debe contener al menos 2 caracteres  ", 400);
        }

        if (strlen($value) > 45) {
            throw new ErrorDomain("El nombre no debe contener más de 45 caracteres  ", 400);
        }
    }
}

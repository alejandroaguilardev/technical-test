<?php

declare (strict_types = 1);

final class ContactEmail extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->isValid($value);
    }

    private function isValid(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new ErrorDomain("El correo electrónico no es válido.", 400);
        }

        if (strlen($value) > 45) {
            throw new ErrorDomain("El apellido no debe contener más de 45 caracteres  ", 400);
        }
    }
}

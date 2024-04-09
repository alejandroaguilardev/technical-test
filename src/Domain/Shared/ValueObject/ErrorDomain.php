<?php

declare (strict_types = 1);

class ErrorDomain extends Exception
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
}

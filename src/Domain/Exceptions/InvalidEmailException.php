<?php

namespace Domain\Exceptions;

use Exception;

class InvalidEmailException extends Exception
{
    public function __construct()
    {
        parent::__construct("El email ingresado no es válido.");
    }
}

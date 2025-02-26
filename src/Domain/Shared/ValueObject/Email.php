<?php

namespace Domain\Shared\ValueObject;

use Domain\Exceptions\InvalidEmailException;

class Email
{
    private string $value;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException();
        }

        $this->value = $email;
    }

    public function getValue(): string
    {
        return $this->value;
    }

  
    public function equals(Email $other): bool
    {
        return strtolower($this->value) === strtolower($other->getValue());
    }
}

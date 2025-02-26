<?php

namespace Domain\Shared\ValueObject;

use Domain\Exceptions\WeakPasswordException;

class Password
{
    private string $value;

    public function __construct(string $password)
    {
        if (!$this->isValidPassword($password)) {
            throw new WeakPasswordException();
        }

        
        $this->value = password_hash($password, PASSWORD_BCRYPT);
    }

    private function isValidPassword(string $password): bool
    {
        return preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function verify(string $password): bool
    {
        return password_verify($password, $this->value);
    }
}

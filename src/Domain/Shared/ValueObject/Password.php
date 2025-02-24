<?php

namespace Domain\Shared\ValueObject;

final class Password
{
    private string $value;

    public function __construct(string $value)
    {
        if (strlen($value) < 8) {
            throw new \InvalidArgumentException("Password must be at least 8 characters long.");
        }
        
        $this->value = password_hash($value, PASSWORD_DEFAULT); 
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function verify(string $plainPassword): bool
    {
        return password_verify($plainPassword, $this->value);
    }
}

<?php

namespace Domain\Shared\ValueObject;

final class Name
{
    private string $value;

    public function __construct(string $value)
    {
        
        if (strlen($value) < 2 || !preg_match('/^[a-zA-Z ]+$/', $value)) {
            throw new \InvalidArgumentException("Name must be at least 2 characters and contain only letters.");
        }
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function equals(Name $other): bool
    {
        return $this->value === $other->getValue();
    }
}

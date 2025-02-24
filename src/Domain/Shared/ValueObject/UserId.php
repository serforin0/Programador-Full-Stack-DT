<?php

namespace Domain\Shared\ValueObject;

final class UserId
{
    private string $value;

    public function __construct(string $value)
    {
        
        if (empty($value)) {
            throw new \InvalidArgumentException("UserId cannot be empty.");
        }
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function equals(UserId $other): bool
    {
        return $this->value === $other->getValue();
    }
}

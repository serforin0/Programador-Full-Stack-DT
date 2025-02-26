<?php

namespace Application\User;

use Domain\User\User;
use Domain\Shared\ValueObject\UserId;
use Domain\Shared\ValueObject\Name;
use Domain\Shared\ValueObject\Email;
use Domain\Shared\ValueObject\Password;
use Domain\Event\UserRegisteredEvent;

class RegisterUserRequest
{
    private string $id;
    private string $name;
    private string $email;
    private string $password;

    public function __construct(string $id, string $name, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    
    public function toUserRegisteredEvent(User $user): UserRegisteredEvent
    {
        return new UserRegisteredEvent($user);
    }
}

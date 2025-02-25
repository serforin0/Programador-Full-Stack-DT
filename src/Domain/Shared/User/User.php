<?php

namespace Domain\User;

use Domain\Shared\ValueObject\UserId;
use Domain\Shared\ValueObject\Name;
use Domain\Shared\ValueObject\Email;
use Domain\Shared\ValueObject\Password;

class User
{
    private UserId $id;
    private Name $name;
    private Email $email;
    private Password $password;
    private \DateTimeImmutable $createdAt;

    public function __construct(UserId $id, Name $name, Email $email, Password $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }
}

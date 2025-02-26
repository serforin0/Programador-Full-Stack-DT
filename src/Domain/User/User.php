<?php

namespace Domain\User;

use Doctrine\ORM\Mapping as ORM;
use Domain\Shared\ValueObject\UserId;
use Domain\Shared\ValueObject\Name;
use Domain\Shared\ValueObject\Email;
use Domain\Shared\ValueObject\Password;

#[ORM\Entity]
#[ORM\Table(name: "users")]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: "string")]
    private string $id;

    #[ORM\Column(type: "string")]
    private string $name;

    #[ORM\Column(type: "string", unique: true)]
    private string $email;

    #[ORM\Column(type: "string")]
    private string $password;

    #[ORM\Column(type: "datetime_immutable")]
    private \DateTimeImmutable $createdAt;

    public function __construct(UserId $id, Name $name, Email $email, Password $password)
    {
        $this->id = $id->getValue();
        $this->name = $name->getValue();
        $this->email = $email->getValue();
        $this->password = $password->getValue();
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): UserId
    {
        return new UserId($this->id);
    }

    public function getName(): Name
    {
        return new Name($this->name);
    }

    public function getEmail(): Email
    {
        return new Email($this->email);
    }

    public function getPassword(): Password
    {
        return new Password($this->password);
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }
}



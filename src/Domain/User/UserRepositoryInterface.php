<?php

namespace Domain\User;

use Domain\Shared\ValueObject\UserId;
use Domain\Shared\ValueObject\Email;

interface UserRepositoryInterface
{
    public function save(User $user): void;
    public function findById(UserId $id): ?User;
    public function delete(UserId $id): void;
    public function findByEmail(Email $email): ?User; 
}

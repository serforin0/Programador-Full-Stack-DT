<?php

namespace Infrastructure\Controller;

use Application\User\RegisterUserUseCase;
use Application\User\RegisterUserRequest;
use Application\User\UserResponseDTO;

class RegisterUserController
{
    private RegisterUserUseCase $registerUserUseCase;

    public function __construct(RegisterUserUseCase $registerUserUseCase)
    {
        $this->registerUserUseCase = $registerUserUseCase;
    }

    public function handle(string $id, string $name, string $email, string $password): UserResponseDTO
    {
        $request = new RegisterUserRequest($id, $name, $email, $password);
        return $this->registerUserUseCase->execute($request);
    }
}

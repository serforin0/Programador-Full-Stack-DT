<?php

namespace Application\User;

use Domain\User\UserRepositoryInterface;
use Domain\User\User;
use Domain\Shared\ValueObject\UserId;
use Domain\Shared\ValueObject\Name;
use Domain\Shared\ValueObject\Email;
use Domain\Shared\ValueObject\Password;
use Domain\Exceptions\UserAlreadyExistsException;

class RegisterUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(RegisterUserRequest $request): User
    {
        // Verifica si el usuario ya existe
        if ($this->userRepository->findByEmail(new Email($request->getEmail()))) {
            throw new UserAlreadyExistsException();
        }

        // Crea un nuevo usuario
        $user = new User(
            new UserId($request->getId()),
            new Name($request->getName()),
            new Email($request->getEmail()),
            new Password($request->getPassword())
        );

        // Guarda el usuario
        $this->userRepository->save($user);

        // Devuelve el usuario creado
        return $user;
    }
}

<?php

namespace Application\User;

use Domain\User\UserRepositoryInterface;
use Domain\Shared\ValueObject\Name;
use Domain\Shared\ValueObject\Email;
use Domain\Shared\ValueObject\Password;
use Domain\Shared\ValueObject\UserId;
use Domain\User\User;
use Domain\Exceptions\UserAlreadyExistsException;
use Application\User\RegisterUserRequest;
use Application\User\UserResponseDTO;

class RegisterUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(RegisterUserRequest $request): UserResponseDTO
    {
        
        $existingUser = $this->userRepository->findById(new UserId($request->getId()));
        if ($existingUser) {
            throw new UserAlreadyExistsException();
        }

        
        $name = new Name($request->getName());
        $email = new Email($request->getEmail());
        $password = new Password($request->getPassword());

        
        $user = new User(new UserId($request->getId()), $name, $email, $password);

       
        $this->userRepository->save($user);

        
        return new UserResponseDTO(
            $user->getId()->getValue(),
            $user->getName()->getValue(),
            $user->getEmail()->getValue(),
            $user->getCreatedAt()->format('Y-m-d H:i:s')
        );
    }
}

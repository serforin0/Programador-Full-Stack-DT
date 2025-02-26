<?php

namespace Application\User;

use PHPUnit\Framework\TestCase;
use Domain\User\User;
use Domain\User\UserRepositoryInterface;
use Domain\Shared\ValueObject\UserId;
use Domain\Shared\ValueObject\Email;
use Domain\Shared\ValueObject\Name;
use Domain\Shared\ValueObject\Password;
use Domain\Exceptions\UserAlreadyExistsException;

class RegisterUserUseCaseTest extends TestCase
{
    private UserRepositoryInterface $userRepository;
    private RegisterUserUseCase $registerUserUseCase;

    protected function setUp(): void
    {
        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
        $this->registerUserUseCase = new RegisterUserUseCase($this->userRepository);
    }

    public function testRegisterNewUser()
    {
        $id = new UserId("123");
        $name = new Name("John Doe");
        $email = new Email("john@example.com");
        $password = new Password("SecureP@ss1");

        // Configura el repositorio para que no devuelva ningún usuario existente
        $this->userRepository
            ->method('findByEmail')
            ->willReturn(null); // Devuelve null para indicar que no hay usuarios existentes

        // Espera que se llame al método save una vez
        $this->userRepository
            ->expects($this->once())
            ->method('save');

        // Registra al usuario
        $user = $this->registerUserUseCase->execute(new RegisterUserRequest(
            $id->getValue(),
            $name->getValue(),
            $email->getValue(),
            $password->getValue()
        ));

        // Verifica que el usuario se haya creado
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($id->getValue(), $user->getId()->getValue());
        $this->assertEquals($name->getValue(), $user->getName()->getValue());
        $this->assertEquals($email->getValue(), $user->getEmail()->getValue());
    }

    public function testRegisterExistingUserThrowsException()
    {
        $id = new UserId("123");
        $name = new Name("John Doe");
        $email = new Email("john@example.com");
        $password = new Password("SecureP@ss1");

        // Configura el repositorio para que devuelva un usuario existente
        $this->userRepository
            ->method('findByEmail')
            ->willReturn(new User($id, $name, $email, $password));

        // Asegúrate de que se lance una excepción
        $this->expectException(UserAlreadyExistsException::class);

        // Intenta registrar al usuario
        $this->registerUserUseCase->execute(new RegisterUserRequest(
            $id->getValue(),
            $name->getValue(),
            $email->getValue(),
            $password->getValue()
        ));
    }
}

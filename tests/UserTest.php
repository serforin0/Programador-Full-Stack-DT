<?php

use PHPUnit\Framework\TestCase;
use Domain\User\User;
use Domain\Shared\ValueObject\UserId;
use Domain\Shared\ValueObject\Name;
use Domain\Shared\ValueObject\Email;
use Domain\Shared\ValueObject\Password;
require_once __DIR__ . '/../src/Domain/Shared/ValueObject/Password.php';
require_once __DIR__ . '/../src/Domain/Exceptions/WeakPasswordException.php';

class UserTest extends TestCase
{
    public function testUserCreation()
{
    $userId = new UserId("123");
    $name = new Name("John Doe");
    $email = new Email("john@example.com");
    $password = new Password("SecureP@ss1");

    $user = new User($userId, $name, $email, $password);

    // Comprobaciones iniciales
    $this->assertEquals("123", $user->getId()->getValue());
    $this->assertEquals("John Doe", $user->getName()->getValue());
    $this->assertEquals("john@example.com", $user->getEmail()->getValue());

    // Comprobación del hash
    $hashedPassword = $user->getPassword()->getValue();
    echo "Hashed Password: $hashedPassword\n";

    $this->assertNotEquals("SecureP@ss1", $hashedPassword);
    $isVerified = $user->verifyPassword("SecureP@ss1"); // Usar el nuevo método aquí
    echo "Password Verified: " . ($isVerified ? 'true' : 'false') . "\n"; 

    $this->assertTrue($isVerified); // Esto debe pasar ahora
    $this->assertInstanceOf(\DateTimeImmutable::class, $user->getCreatedAt());
}

    

}

<?php

use Domain\Shared\ValueObject\Password;
use Domain\Exceptions\WeakPasswordException;
require_once __DIR__ . '/../src/Domain/Shared/ValueObject/Password.php';
require_once __DIR__ . '/../src/Domain/Exceptions/WeakPasswordException.php';

class PasswordValueObjectTest extends \PHPUnit\Framework\TestCase
{
    public function testCreatePassword()
    {
        // Contraseña que cumple con la política (mínimo 8 caracteres, 1 mayúscula, 1 número, 1 carácter especial)
        $password = new Password('SecurePss1@');
        $this->assertNotEmpty($password->getValue());
    }

    public function testCreatePasswordThrowsExceptionOnShortPassword()
    {
        $this->expectException(WeakPasswordException::class);
        $this->expectExceptionMessage("La contraseña no cumple con los requisitos de seguridad.");

        new Password('Short1!');
    }

    public function testVerifyPassword()
    {
        $password = new Password('SecureP@ss1');
        $this->assertTrue($password->verify('SecureP@ss1'));
        $this->assertFalse($password->verify('WrongPass1!'));
    }
}

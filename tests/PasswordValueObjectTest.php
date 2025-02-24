<?php

use Domain\Shared\ValueObject\Password;
require_once __DIR__ . '/../src/Domain/Shared/ValueObject/Password.php';

class PasswordValueObjectTest extends \PHPUnit\Framework\TestCase
{
    public function testCreatePassword()
    {
        $password = new Password('securepassword');
        $this->assertNotEmpty($password->getValue());
    }

    public function testCreatePasswordThrowsExceptionOnShortPassword()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Password('short'); 
    }

    public function testVerifyPassword()
    {
        $password = new Password('securepassword');
        $this->assertTrue($password->verify('securepassword'));
        $this->assertFalse($password->verify('wrongpassword'));
    }
}

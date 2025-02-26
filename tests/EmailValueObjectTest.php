<?php

require_once __DIR__ . '/../src/Domain/Shared/ValueObject/Email.php';
require_once __DIR__ . '/../src/Domain/Exceptions/InvalidEmailException.php';
use Domain\Shared\ValueObject\Email;
use Domain\Exceptions\InvalidEmailException;
use PHPUnit\Framework\TestCase;



class EmailValueObjectTest extends TestCase
{
    public function testCreateEmail()
    {
        $email = new Email('john.doe@example.com');
        $this->assertEquals('john.doe@example.com', $email->getValue());
    }

    public function testCreateEmailThrowsExceptionOnInvalidFormat()
    {
        $this->expectException(InvalidEmailException::class);
        $this->expectExceptionMessage("El email ingresado no es válido."); 

        new Email('invalid-email'); 
    }

    public function testEmailEquality()
    {
        $email1 = new Email('john.doe@example.com');
        $email2 = new Email('john.doe@example.com');
        $this->assertTrue($email1->equals($email2));

        $email3 = new Email('jane.doe@example.com');
        $this->assertFalse($email1->equals($email3));
    }
}

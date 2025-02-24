<?php

use Domain\Shared\ValueObject\Email;
require_once __DIR__ . '/../src/Domain/Shared/ValueObject/Email.php';

class EmailValueObjectTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateEmail()
    {
        $email = new Email('john.doe@example.com');
        $this->assertEquals('john.doe@example.com', $email->getValue());
    }

    public function testCreateEmailThrowsExceptionOnInvalidFormat()
    {
        $this->expectException(\InvalidArgumentException::class);
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

<?php

use Domain\Shared\ValueObject\Name;
require_once __DIR__ . '/../src/Domain/Shared/ValueObject/Name.php';

class NameValueObjectTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateName()
    {
        $name = new Name('John Doe');
        $this->assertEquals('John Doe', $name->getValue());
    }

    public function testCreateNameThrowsExceptionOnInvalidName()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Name('J'); 
    }

    public function testCreateNameThrowsExceptionOnInvalidCharacters()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Name('John123'); 
    }

    public function testNameEquality()
    {
        $name1 = new Name('John Doe');
        $name2 = new Name('John Doe');
        $this->assertTrue($name1->equals($name2));
        
        $name3 = new Name('Jane Doe');
        $this->assertFalse($name1->equals($name3));
    }
}

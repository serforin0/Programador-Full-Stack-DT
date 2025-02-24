<?php


require_once __DIR__ . '/../src/Domain/Shared/ValueObject/UserId.php';

use Domain\Shared\ValueObject\UserId;
use PHPUnit\Framework\TestCase;

class UserIdTest extends TestCase
{
    public function testCreateUserId()
    {
        $userId = new UserId('123');
        $this->assertEquals('123', $userId->getValue());
    }

    public function testCreateUserIdThrowsExceptionOnEmpty()
    {
        $this->expectException(\InvalidArgumentException::class);
        new UserId('');
    }

    public function testUserIdEquality()
    {
        $userId1 = new UserId('123');
        $userId2 = new UserId('123');
        $this->assertTrue($userId1->equals($userId2));
        
        $userId3 = new UserId('456');
        $this->assertFalse($userId1->equals($userId3));
    }
}

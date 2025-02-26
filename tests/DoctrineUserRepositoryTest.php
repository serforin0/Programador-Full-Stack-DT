<?php

use PHPUnit\Framework\TestCase;
use Domain\User\User;
use Domain\Shared\ValueObject\UserId;
use Domain\Shared\ValueObject\Name;
use Domain\Shared\ValueObject\Email;
use Domain\Shared\ValueObject\Password;
use Infrastructure\Persistence\DoctrineUserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\DBAL\DriverManager;

require_once __DIR__ . '/../src/Domain/User/UserRepositoryInterface.php';
require_once __DIR__ . '/../src/Application/Infrastructure/Persistence/DoctrineUserRepository.php';
require_once __DIR__ . '/../src/Domain/User/User.php';


class DoctrineUserRepositoryTest extends TestCase
{
    private DoctrineUserRepository $repository;
    private EntityManager $entityManager;

    protected function setUp(): void
    {
        
        $paths = [__DIR__ . '/../src/Domain/User'];
        $isDevMode = true;

        
        $config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);

       
        $connectionParams = [
            'driver' => 'pdo_sqlite',
            'memory' => true, 
        ];
        
        
        $connection = DriverManager::getConnection($connectionParams, $config);

        
        $this->entityManager = new EntityManager($connection, $config);

        
        $schemaTool = new SchemaTool($this->entityManager);
        $metadata = $this->entityManager->getMetadataFactory()->getAllMetadata();
        if (empty($metadata)) {
            throw new \Exception("No metadata found for entities. Check entity paths and annotations.");
        }
        $schemaTool->createSchema($metadata);

        
        $this->repository = new DoctrineUserRepository($this->entityManager);
    }

    public function testSaveAndFindUser()
    {
        $user = new User(new UserId("123"), new Name("John Doe"), new Email("john@example.com"), new Password("SecureP@ss1"));
        
        $this->repository->save($user);
        
        $foundUser = $this->repository->findById(new UserId("123"));
        
        $this->assertNotNull($foundUser);
        $this->assertEquals("John Doe", $foundUser->getName()->getValue());
    }
}

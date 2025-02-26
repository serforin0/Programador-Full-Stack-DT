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
require_once __DIR__ . '/../src/Domain/User';

class DoctrineUserRepositoryTest extends TestCase
{
    private DoctrineUserRepository $repository;
    private EntityManager $entityManager;

    protected function setUp(): void
    {
        // Rutas de las entidades
        $paths = [__DIR__ . '/../src/Domain/User'];
        $isDevMode = true;

        // Configuración de Doctrine ORM (ahora con ORMSetup)
        $config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);

        // Configuración de la base de datos en memoria
        $connectionParams = [
            'driver' => 'pdo_sqlite',
            'memory' => true, // Base de datos en memoria
        ];
        
        // Conexión a la base de datos con DriverManager
        $connection = DriverManager::getConnection($connectionParams, $config);

        // Creación del EntityManager
        $this->entityManager = new EntityManager($connection, $config);

        // Creación del esquema en memoria
        $schemaTool = new SchemaTool($this->entityManager);
        $metadata = $this->entityManager->getMetadataFactory()->getAllMetadata();
        if (empty($metadata)) {
            throw new \Exception("No metadata found for entities. Check entity paths and annotations.");
        }
        $schemaTool->createSchema($metadata);

        // Instancia del repositorio
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

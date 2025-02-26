<?php

namespace Infrastructure\Persistence;

use Domain\User\UserRepositoryInterface;
use Domain\User\User;
use Domain\Shared\ValueObject\UserId;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class DoctrineUserRepository implements UserRepositoryInterface
{
    private EntityManagerInterface $entityManager;
    private EntityRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(User::class);
    }

    public function save(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function findById(UserId $id): ?User
    {
        return $this->repository->find($id->getValue());
    }

    public function delete(UserId $id): void
    {
        $user = $this->findById($id);
        if ($user) {
            $this->entityManager->beginTransaction();
            try {
                $this->entityManager->remove($user);
                $this->entityManager->flush();
                $this->entityManager->commit();
            } catch (\Exception $e) {
                $this->entityManager->rollback();
                throw $e;
            }
        }
    }
}

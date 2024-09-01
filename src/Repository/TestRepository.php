<?php

namespace App\Repository;

use App\Entity\Test;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Test::class);
    }

    final public function getTitles(): array
    {
        return $this->createQueryBuilder('t')
            ->select('t.id', 't.title', 't.text')
            ->getQuery()
            ->getResult();
    }

    final public function findOneById(int $id): ?Test
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}

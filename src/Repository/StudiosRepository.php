<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Studios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Studios>
 *
 * @method Studios|null find($id, $lockMode = null, $lockVersion = null)
 * @method Studios|null findOneBy(array $criteria, array $orderBy = null)
 * @method Studios[]    findAll()
 * @method Studios[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class StudiosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Studios::class);
    }

    public function add(Studios $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Studios $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}

<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Episodes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Episodes>
 *
 * @method Episodes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Episodes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Episodes[]    findAll()
 * @method Episodes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class EpisodesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Episodes::class);
    }

    public function add(Episodes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Episodes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}

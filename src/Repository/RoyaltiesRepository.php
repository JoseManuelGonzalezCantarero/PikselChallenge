<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Royalties;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Royalties>
 *
 * @method Royalties|null find($id, $lockMode = null, $lockVersion = null)
 * @method Royalties|null findOneBy(array $criteria, array $orderBy = null)
 * @method Royalties[]    findAll()
 * @method Royalties[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class RoyaltiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Royalties::class);
    }

    public function add(Royalties $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Royalties $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function resetTable(): void
    {
        $this->createQueryBuilder('Royalty')->delete()
            ->getQuery()
            ->execute();
    }
}

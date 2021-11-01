<?php

namespace App\Repository;

use App\Entity\SalleProjection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SalleProjection|null find($id, $lockMode = null, $lockVersion = null)
 * @method SalleProjection|null findOneBy(array $criteria, array $orderBy = null)
 * @method SalleProjection[]    findAll()
 * @method SalleProjection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalleProjectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SalleProjection::class);
    }

    // /**
    //  * @return SalleProjection[] Returns an array of SalleProjection objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SalleProjection
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

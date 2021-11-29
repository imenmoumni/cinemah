<?php

namespace App\Repository;

use App\Entity\Avs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Avs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avs[]    findAll()
 * @method Avs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Avs::class);
    }

    // /**
    //  * @return Avs[] Returns an array of Avs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Avs
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

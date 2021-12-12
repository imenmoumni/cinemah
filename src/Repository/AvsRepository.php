<?php

namespace App\Repository;

use App\Entity\Avs;
use App\Data1\SearchData1;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Avs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avs[]    findAll()
 * @method Avs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvsRepository extends ServiceEntityRepository
{
    
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator )
    {
        parent::__construct($registry, Avs::class);
        $this->paginator = $paginator;
    }

    /**
     * Résoudre les cours en lien avec une recherche
     * @return PaginationInterface
     */

    public function findSearch(SearchData1 $search): PaginationInterface
    {
        $query = $this
         ->createQueryBuilder('p')
         ->select('c','p')
         ->join('p.region', 'c');

         if (!empty($search->q)) {
            $query = $query
                ->andWhere('p.nom LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }

        if (!empty($search->min)) {
            $query = $query
                ->andWhere('p.prix >= :min')
                ->setParameter('min', $search->min);
        }

        if (!empty($search->max) ) {
            $query = $query
                ->andWhere('p.prix <= :max')
                ->setParameter('max', $search->max);
        }



        if (!empty($search->region)) {
            $query = $query
                ->andWhere('c.id IN (:region)')
                ->setParameter('region', $search->region);
        }

        $query = $query->getQuery();
        return $this->paginator->paginate(
            $query,
            $search->page,
           12
        );
    }


}

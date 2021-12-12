<?php

namespace App\Repository;

use App\Entity\Medecin;
use App\Data\SearchData;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Medecin|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medecin|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medecin[]    findAll()
 * @method Medecin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedecinRepository extends ServiceEntityRepository
{
        
            public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator )
            {
                parent::__construct($registry, Medecin::class);
                $this->paginator = $paginator;
            }
        
            /**
             * Résoudre les cours en lien avec une recherche
             * @return PaginationInterface
             */
        
            public function findSearch(SearchData $search): PaginationInterface
            {
                $query = $this
                 ->createQueryBuilder('p')
                 ->select('c','p')
                 ->join('p.category', 'c');
        
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
        
        
        
                if (!empty($search->category)) {
                    $query = $query
                        ->andWhere('c.id IN (:category)')
                        ->setParameter('category', $search->category);
                }
        
                $query = $query->getQuery();
                return $this->paginator->paginate(
                    $query,
                    $search->page,
                   12
                );
            }
        
        
        }

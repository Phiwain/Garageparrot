<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Cars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\CarFilterType;

class CarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cars::class);
    }


    /**
     * Recupere les voitures pour le filtrage
     * @return  Cars[]
     */

    public function findSearch(SearchData $search): array
        {
            $query = $this
                ->createQueryBuilder('c')
                ->select('c', 'carburant')
                ->join('c.Carburant', 'carburant');


            if(!empty($search->prixMin)){
                $query = $query
                    ->andWhere('c.Price >= :prixMin')
                    ->setParameter('prixMin', $search->prixMin);
            }
            if(!empty($search->prixMax)){
                $query = $query
                    ->andWhere('c.Price <= :prixMax')
                    ->setParameter('prixMax', $search->prixMax);
        }
            if(!empty($search->kmMin)){
                $query = $query
                    ->andWhere('c.Kilometrage >= :kmMin')
                    ->setParameter('kmMin', $search->kmMin);
            }
            if(!empty($search->kmMax)){
                $query = $query
                    ->andWhere('c.Kilometrage <= :kmMax')
                    ->setParameter('kmMax', $search->kmMax);
            }
            if(!empty($search->yearMin)){
                $query = $query
                    ->andWhere('c.Year >= :yearMin')
                    ->setParameter('yearMin', $search->yearMin);
            }
            if(!empty($search->yearMax)){
                $query = $query
                    ->andWhere('c.Year <= :yearMax')
                    ->setParameter('yearMax', $search->yearMax);
            }

            if(!empty($search->carburants)){
                $query = $query
                    ->andWhere('c.Carburant IN (:carburants)')
                    ->setParameter('carburants', $search->carburants);
            }
            return $query->getQuery()->getResult();

}}

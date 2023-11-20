<?php

namespace App\Repository;

use App\Entity\Carburants;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Carburants>
 *
 * @method Carburants|null find($id, $lockMode = null, $lockVersion = null)
 * @method Carburants|null findOneBy(array $criteria, array $orderBy = null)
 * @method Carburants[]    findAll()
 * @method Carburants[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarburantsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Carburants::class);
    }

//    /**
//     * @return Carburants[] Returns an array of Carburants objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Carburants
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

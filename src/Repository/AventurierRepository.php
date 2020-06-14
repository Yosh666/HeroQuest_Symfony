<?php

namespace App\Repository;

use App\Entity\Aventurier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Aventurier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aventurier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aventurier[]    findAll()
 * @method Aventurier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AventurierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aventurier::class);
    }

    // /**
    //  * @return Aventurier[] Returns an array of Aventurier objects
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
    public function findOneBySomeField($value): ?Aventurier
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

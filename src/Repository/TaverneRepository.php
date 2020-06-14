<?php

namespace App\Repository;

use App\Entity\Taverne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Taverne|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taverne|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taverne[]    findAll()
 * @method Taverne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaverneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Taverne::class);
    }

    // /**
    //  * @return Taverne[] Returns an array of Taverne objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Taverne
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

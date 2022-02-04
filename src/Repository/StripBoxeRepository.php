<?php

namespace App\Repository;

use App\Entity\StripBoxe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StripBoxe|null find($id, $lockMode = null, $lockVersion = null)
 * @method StripBoxe|null findOneBy(array $criteria, array $orderBy = null)
 * @method StripBoxe[]    findAll()
 * @method StripBoxe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StripBoxeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StripBoxe::class);
    }

    // /**
    //  * @return StripBoxe[] Returns an array of StripBoxe objects
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
    public function findOneBySomeField($value): ?StripBoxe
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

<?php

namespace App\Repository;

use App\Entity\TypeAnalyse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeAnalyse|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAnalyse|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAnalyse[]    findAll()
 * @method TypeAnalyse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAnalyseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeAnalyse::class);
    }

    // /**
    //  * @return TypeAnalyse[] Returns an array of TypeAnalyse objects
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
    public function findOneBySomeField($value): ?TypeAnalyse
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

<?php

namespace App\Repository;

use App\Entity\Refuges;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Refuges|null find($id, $lockMode = null, $lockVersion = null)
 * @method Refuges|null findOneBy(array $criteria, array $orderBy = null)
 * @method Refuges[]    findAll()
 * @method Refuges[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RefugesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Refuges::class);
    }

    // /**
    //  * @return Refuges[] Returns an array of Refuges objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Refuges
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

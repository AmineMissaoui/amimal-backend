<?php

namespace App\Repository;

use App\Entity\FicheAnimal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FicheAnimal|null find($id, $lockMode = null, $lockVersion = null)
 * @method FicheAnimal|null findOneBy(array $criteria, array $orderBy = null)
 * @method FicheAnimal[]    findAll()
 * @method FicheAnimal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheAnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FicheAnimal::class);
    }

    // /**
    //  * @return FicheAnimal[] Returns an array of FicheAnimal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FicheAnimal
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

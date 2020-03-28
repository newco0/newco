<?php

namespace App\Repository;

use App\Entity\AdminResponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AdminResponse|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdminResponse|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdminResponse[]    findAll()
 * @method AdminResponse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminResponseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdminResponse::class);
    }

    // /**
    //  * @return AdminResponse[] Returns an array of AdminResponse objects
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
    public function findOneBySomeField($value): ?AdminResponse
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

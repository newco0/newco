<?php

namespace App\Repository;

use App\Entity\DiscussionHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DiscussionHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiscussionHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiscussionHistory[]    findAll()
 * @method DiscussionHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscussionHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiscussionHistory::class);
    }

    // /**
    //  * @return DiscussionHistory[] Returns an array of DiscussionHistory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DiscussionHistory
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

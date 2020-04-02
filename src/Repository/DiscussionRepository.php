<?php

namespace App\Repository;

use App\Entity\Discussion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Discussion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Discussion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Discussion[]    findAll()
 * @method Discussion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscussionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Discussion::class);
    }

    public function findAllDiscussionByUser($value)
    {
        $qb = $this->createQueryBuilder('f')
            ->where('f.exp = :userId')
            ->orWhere('f.dest = :userId')
            ->orderBy('f.date_update', 'DESC')
            ->setParameter('userId', $value);
        

        $query = $qb->getQuery();
// dd($query);
        return $query->execute();
    }

    // /**
    //  * @return Discussion[] Returns an array of Discussion objects
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
    public function findOneBySomeField($value): ?Discussion
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

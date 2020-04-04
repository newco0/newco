<?php

namespace App\Repository;

use App\Entity\Friend;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Friend|null find($id, $lockMode = null, $lockVersion = null)
 * @method Friend|null findOneBy(array $criteria, array $orderBy = null)
 * @method Friend[]    findAll()
 * @method Friend[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FriendRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Friend::class);
    }

    public function findFriendByIdUser($value)
    {
        return $this->createQueryBuilder('f')
            ->where('f.user = :value')
            ->orWhere('f.friend = :value')
            ->setParameter('value', $value)
            ->getQuery()
            ->getResult();
    }

    public function findFriendByIdUserAccepted($value)
    {
        return $this->createQueryBuilder('f')
            ->where('f.user = :value')
            ->orWhere('f.friend = :value')
            ->andWhere('f.isAccepted = true')
            ->setParameter('value', $value)
            ->getQuery()
            ->getResult();
    }

    public function findFriendByIdRequest($iduser, $idsearch)
    {
        return $this->createQueryBuilder('f')
            ->where('f.user = :iduser')
            ->andWhere('f.friend = :idsearch')
            ->setParameter('idsearch', $idsearch)
            ->setParameter('iduser', $iduser)
            ->getQuery()
            ->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Friend
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

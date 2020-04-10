<?php

namespace App\Repository;

use App\Entity\Image;
use App\Entity\Publication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Publication|null find($id, $lockMode = null, $lockVersion = null)
 * @method Publication|null findOneBy(array $criteria, array $orderBy = null)
 * @method Publication[]    findAll()
 * @method Publication[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PublicationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Publication::class);
    }

    // /**
    //  * @return Publication[] Returns an array of Publication objects
    //  */
    
    // public function findWithImage()
    // {
    //     return $this->createQueryBuilder('p')
    //         ->innerJoin(Image::class, 'i', 'p.id = i.publication')
    //         ->orderBy('p.date_register', 'DESC')
    //         ->Where('p.id')
    //         ->andWhere('i','i.publication')
    //         ->setMaxResults(100)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }

    public function findWithImage()
{
    $conn = $this->getEntityManager()->getConnection();

    $sql = '
    SELECT * FROM publication INNER JOIN image ON publication.id = image.publication_id ';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // returns an array of arrays (i.e. a raw data set)
    return $stmt->fetchAll();
}

// 'SELECT p, c
// FROM App\Entity\Publication p
// INNER JOIN p.category c
// WHERE p.id = :id'

    /*
    public function findOneBySomeField($value): ?Publication
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

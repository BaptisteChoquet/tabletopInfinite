<?php

namespace App\Repository;

use App\Entity\BlankPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BlankPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlankPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlankPage[]    findAll()
 * @method BlankPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlankPageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlankPage::class);
    }

    // /**
    //  * @return BlankPage[] Returns an array of BlankPage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BlankPage
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

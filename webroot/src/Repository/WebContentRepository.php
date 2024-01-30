<?php

namespace App\Repository;

use App\Entity\WebContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WebContent>
 *
 * @method WebContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method WebContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method WebContent[]    findAll()
 * @method WebContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WebContent::class);
    }

    /**
     * @throws NonUniqueResultException
     */
    public function findByPage(string $page) {
        return $this->createQueryBuilder('w')
            ->andWhere('w.page = :page')
            ->setParameter('page', $page)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

//    /**
//     * @return WebContent[] Returns an array of WebContent objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WebContent
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

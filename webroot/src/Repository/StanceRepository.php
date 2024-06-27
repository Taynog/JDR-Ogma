<?php

namespace App\Repository;

use App\Entity\Stance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Stance>
 *
 * @method Stance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stance[]    findAll()
 * @method Stance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stance::class);
    }

//    /**
//     * @return Stance[] Returns an array of Stance objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Stance
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

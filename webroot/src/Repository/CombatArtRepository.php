<?php

namespace App\Repository;

use App\Entity\CombatArt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CombatArt>
 *
 * @method CombatArt|null find($id, $lockMode = null, $lockVersion = null)
 * @method CombatArt|null findOneBy(array $criteria, array $orderBy = null)
 * @method CombatArt[]    findAll()
 * @method CombatArt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CombatArtRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CombatArt::class);
    }

//    /**
//     * @return CombatArt[] Returns an array of CombatArt objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CombatArt
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

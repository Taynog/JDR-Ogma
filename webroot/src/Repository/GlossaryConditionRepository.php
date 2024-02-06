<?php

namespace App\Repository;

use App\Entity\GlossaryCondition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GlossaryCondition>
 *
 * @method GlossaryCondition|null find($id, $lockMode = null, $lockVersion = null)
 * @method GlossaryCondition|null findOneBy(array $criteria, array $orderBy = null)
 * @method GlossaryCondition[]    findAll()
 * @method GlossaryCondition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlossaryConditionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GlossaryCondition::class);
    }

//    /**
//     * @return Condition[] Returns an array of Condition objects
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

//    public function findOneBySomeField($value): ?Condition
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

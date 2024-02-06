<?php

namespace App\Repository;

use App\Entity\WeaponCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeaponCategory>
 *
 * @method WeaponCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeaponCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeaponCategory[]    findAll()
 * @method WeaponCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeaponCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeaponCategory::class);
    }

//    /**
//     * @return WeaponCategory[] Returns an array of WeaponCategory objects
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

//    public function findOneBySomeField($value): ?WeaponCategory
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

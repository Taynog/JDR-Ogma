<?php

namespace App\Repository;

use App\Entity\WeaponProperties;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeaponProperties>
 *
 * @method WeaponProperties|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeaponProperties|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeaponProperties[]    findAll()
 * @method WeaponProperties[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeaponPropertiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeaponProperties::class);
    }

//    /**
//     * @return WeaponProperties[] Returns an array of WeaponProperties objects
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

//    public function findOneBySomeField($value): ?WeaponProperties
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

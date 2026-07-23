<?php

namespace App\Repository;

use App\Entity\WeaponPropertyDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeaponPropertyDetails>
 *
 * @method WeaponPropertyDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeaponPropertyDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeaponPropertyDetails[]    findAll()
 * @method WeaponPropertyDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeaponPropertyDetailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeaponPropertyDetails::class);
    }

//    /**
//     * @return WeaponPropertyDetails[] Returns an array of WeaponPropertyDetails objects
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

//    public function findOneBySomeField($value): ?WeaponPropertyDetails
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

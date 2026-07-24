<?php

namespace App\Repository;

use App\Entity\WeaponProperty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeaponProperty>
 *
 * @method WeaponProperty|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeaponProperty|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeaponProperty[]    findAll()
 * @method WeaponProperty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeaponPropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeaponProperty::class);
    }
}

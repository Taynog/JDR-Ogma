<?php

namespace App\Repository;

use App\Entity\Armor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Armor>
 *
 * @method Armor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Armor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Armor[]    findAll()
 * @method Armor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArmorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Armor::class);
    }
}

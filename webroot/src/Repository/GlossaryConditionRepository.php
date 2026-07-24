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
}

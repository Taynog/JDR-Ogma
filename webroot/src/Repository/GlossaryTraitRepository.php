<?php

namespace App\Repository;

use App\Entity\GlossaryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GlossaryTrait>
 *
 * @method GlossaryTrait|null find($id, $lockMode = null, $lockVersion = null)
 * @method GlossaryTrait|null findOneBy(array $criteria, array $orderBy = null)
 * @method GlossaryTrait[]    findAll()
 * @method GlossaryTrait[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlossaryTraitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GlossaryTrait::class);
    }
}

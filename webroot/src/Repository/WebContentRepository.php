<?php

namespace App\Repository;

use App\Entity\WebContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WebContent>
 *
 * @method WebContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method WebContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method WebContent[]    findAll()
 * @method WebContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WebContent::class);
    }
}

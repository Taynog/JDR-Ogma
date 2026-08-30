<?php

namespace App\Repository;

use App\Entity\WebContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WebContent>
 */
class WebContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WebContent::class);
    }

    public function findByPage(string $page): ?WebContent
    {
        return $this->findOneBy(['page' => $page]);
    }
}

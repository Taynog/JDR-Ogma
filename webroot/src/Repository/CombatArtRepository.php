<?php

namespace App\Repository;

use App\Entity\CombatArt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CombatArt>
 *
 * @method CombatArt|null find($id, $lockMode = null, $lockVersion = null)
 * @method CombatArt|null findOneBy(array $criteria, array $orderBy = null)
 * @method CombatArt[]    findAll()
 * @method CombatArt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CombatArtRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CombatArt::class);
    }

    /**
     * @return CombatArt[]
     */
    public function findBySection(int $section): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.section = :section')
            ->setParameter('section', $section)
            ->orderBy('c.orderIndex', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Arts grouped by category, then by tier.
     *
     * @return array<string, array<string, CombatArt[]>>
     */
    public function findGroupedByCategoryAndTier(int $section): array
    {
        $arts = $this->findBySection($section);
        $grouped = [];

        foreach ($arts as $art) {
            $category = $art->getCategory() ?? '';
            $tier = $art->getTier() ?? '';
            $grouped[$category][$tier][] = $art;
        }

        return $grouped;
    }

    /**
     * Arts grouped by category for the "Arts du combat" section.
     *
     * @return array<string, CombatArt[]>
     */
    public function findGroupedByCategory(int $section): array
    {
        $arts = $this->findBySection($section);
        $grouped = [];

        foreach ($arts as $art) {
            $category = $art->getCategory() ?? '';
            $grouped[$category][] = $art;
        }

        return $grouped;
    }
}

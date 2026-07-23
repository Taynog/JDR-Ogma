<?php

namespace App\Repository;

use App\Entity\Weapon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Weapon>
 *
 * @method Weapon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Weapon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Weapon[]    findAll()
 * @method Weapon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeaponRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Weapon::class);
    }

    public function findGroupedByType(): array
    {
        $weapons = $this->createQueryBuilder('w')
            ->innerJoin('w.category', 'c')
            ->addSelect('c')
            ->getQuery()
            ->getResult();

        $melee = [];
        $ranged = [];

        foreach ($weapons as $weapon) {
            $categoryName = $weapon->getCategory()->getCategory();
            if (preg_match('/[0-9]+m/', $weapon->getReach())) {
                $ranged[$categoryName][] = $weapon;
            } else {
                $melee[$categoryName][] = $weapon;
            }
        }

        return ['melee' => $melee, 'ranged' => $ranged];
    }
}

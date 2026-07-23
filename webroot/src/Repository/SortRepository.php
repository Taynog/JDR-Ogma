<?php

namespace App\Repository;

use App\Entity\Sort;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Sort>
 *
 * @method Sort|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sort|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sort[]    findAll()
 * @method Sort[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sort::class);
    }

    /**
     * @return Sort[]
     */
    public function findByEcole(string $ecole): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.ecole = :ecole')
            ->setParameter('ecole', $ecole)
            ->orderBy('s.effet', 'ASC')
            ->addOrderBy('s.dc', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Sort[]
     */
    public function search(array $filters): array
    {
        $qb = $this->createQueryBuilder('s');

        if (!empty($filters['nom'])) {
            $qb->andWhere('s.effet LIKE :effet')
               ->setParameter('effet', '%' . $filters['nom'] . '%');
        }

        if (!empty($filters['desc'])) {
            $qb->andWhere('s.description LIKE :desc')
               ->setParameter('desc', '%' . $filters['desc'] . '%');
        }

        if (!empty($filters['prop'])) {
            $qb->andWhere('s.propriete LIKE :prop')
               ->setParameter('prop', '%' . $filters['prop'] . '%');
        }

        if (!empty($filters['ecole']) && $filters['ecole'] !== 'all') {
            $qb->andWhere('s.ecole LIKE :ecole')
               ->setParameter('ecole', '%' . $filters['ecole'] . '%');
        }

        if (!empty($filters['inkarnai']) && $filters['inkarnai'] !== 'all') {
            $qb->andWhere('s.inkarnai LIKE :ink')
               ->setParameter('ink', '%' . $filters['inkarnai'] . '%');
        }

        return $qb->orderBy('s.effet', 'ASC')
            ->addOrderBy('s.dc', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
}

<?php

namespace App\Repository;

use App\Entity\Marque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class MarqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Marque::class);
    }

    
    /**
     * Trouve une Marque par son nom
     *
     * @param string $nom
     * @return Marque[] Retourne un tableau de Marque
     */
    public function findByName(string $name): array
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.name LIKE :name') // Vérifie que le champ 'name' existe dans l'entité Marque
            ->setParameter('name', '%' . $name . '%')
            ->orderBy('m.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve une Marque par son ID
     *
     * @param int $id
     * @return Marque|null Retourne une Marque ou null
     */
    public function findById(int $id): ?Marque
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}

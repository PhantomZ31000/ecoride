<?php

namespace App\Repository;

use App\Entity\Dispose;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class DisposeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dispose::class);
    }

    // Méthode personnalisée pour rechercher un Dispose par un critère, exemple par ID ou autre champ.
    /**
     * Trouve les enregistrements Dispose par un critère spécifique
     *
     * @param string $field
     * @param mixed $value
     * @return Dispose[] Retourne un tableau de Dispose
     */
    public function findByField(string $field, $value): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.' . $field . ' = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }

    
    /**
     * Trouve un enregistrement Dispose par son ID
     *
     * @param int $id
     * @return Dispose|null Retourne un enregistrement Dispose ou null
     */
    public function findById(int $id): ?Dispose
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}

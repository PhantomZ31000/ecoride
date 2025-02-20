<?php

namespace App\Repository;

use App\Entity\Configuration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Configuration>
 */
class ConfigurationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Configuration::class);
    }

    // Ajoute des méthodes personnalisées si nécessaire.
    // Exemple de méthode pour récupérer une configuration particulière si nécessaire.

    // Exemple: trouver une configuration par un champ spécifique
    // public function findBySomeField($value): array
    // {
    //     return $this->createQueryBuilder('c')
    //         ->andWhere('c.someField = :val')
    //         ->setParameter('val', $value)
    //         ->getQuery()
    //         ->getResult();
    // }
}

<?php

namespace App\Repository;

use App\Entity\Avis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Avis>
 */
class AvisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Avis::class);
    }

    /**
     * Trouve les avis par passager
     *
     * @param int $passagerId
     * @return Avis[] Returns an array of Avis objects
     */
    public function findByPassager(int $passagerId): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.passager = :passagerId')
            ->setParameter('passagerId', $passagerId)
            ->orderBy('a.date_avis', 'DESC') // Tri par date d'avis, du plus récent au plus ancien
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve les avis par conducteur
     *
     * @param int $conducteurId
     * @return Avis[] Returns an array of Avis objects
     */
    public function findByConducteur(int $conducteurId): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.conducteur = :conducteurId')
            ->setParameter('conducteurId', $conducteurId)
            ->orderBy('a.date_avis', 'DESC') // Tri par date d'avis, du plus récent au plus ancien
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve les avis par covoiturage
     *
     * @param int $covoiturageId
     * @return Avis[] Returns an array of Avis objects
     */
    public function findByCovoiturage(int $covoiturageId): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.covoiturage = :covoiturageId')
            ->setParameter('covoiturageId', $covoiturageId)
            ->orderBy('a.date_avis', 'DESC') // Tri par date d'avis, du plus récent au plus ancien
            ->getQuery()
            ->getResult();
    }
}

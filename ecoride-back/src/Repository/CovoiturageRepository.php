<?php

namespace App\Repository;

use App\Entity\Covoiturage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class CovoiturageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Covoiturage::class);
    }

    /**
     * Trouve les covoiturages par lieu de départ
     *
     * @param string $lieu
     * @return Covoiturage[] Retourne un tableau de Covoiturage
     */
    public function findByLieuDepart(string $lieu): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.lieu_depart LIKE :lieu')
            ->setParameter('lieu', '%' . $lieu . '%')
            ->orderBy('c.date_depart', 'ASC') // Tri par date de départ, du plus proche au plus lointain
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve les covoiturages par lieu d'arrivée
     *
     * @param string $lieu
     * @return Covoiturage[] Retourne un tableau de Covoiturage
     */
    public function findByLieuArrivee(string $lieu): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.lieu_arrivee LIKE :lieu')
            ->setParameter('lieu', '%' . $lieu . '%')
            ->orderBy('c.date_depart', 'ASC') // Tri par date de départ, du plus proche au plus lointain
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve les covoiturages par prix
     *
     * @param float $prix
     * @return Covoiturage[] Retourne un tableau de Covoiturage
     */
    public function findByPrix(float $prix): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.prix <= :prix')
            ->setParameter('prix', $prix)
            ->orderBy('c.date_depart', 'ASC') // Tri par date de départ, du plus proche au plus lointain
            ->getQuery()
            ->getResult();
    }
}

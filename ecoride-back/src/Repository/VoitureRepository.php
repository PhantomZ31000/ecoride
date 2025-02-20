<?php

namespace App\Repository;

use App\Entity\Voiture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class VoitureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Voiture::class);
    }

    /**
     * Recherche des voitures par modèle
     *
     * @param string $modele
     * @return Voiture[] Retourne un tableau de Voiture
     */
    public function findByModele(string $modele): array
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.modele LIKE :modele')
            ->setParameter('modele', '%' . $modele . '%')
            ->orderBy('v.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Recherche des voitures par marque
     *
     * @param string $marque
     * @return Voiture[] Retourne un tableau de Voiture
     */
    public function findByMarque(string $marque): array
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.marque LIKE :marque')
            ->setParameter('marque', '%' . $marque . '%')
            ->orderBy('v.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Recherche des voitures par immatriculation
     *
     * @param string $immatriculation
     * @return Voiture|null Retourne une voiture ou null
     */
    public function findByImmatriculation(string $immatriculation): ?Voiture
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.immatriculation = :immatriculation')
            ->setParameter('immatriculation', $immatriculation)
            ->getQuery()
            ->getOneOrNullResult();
    }
}

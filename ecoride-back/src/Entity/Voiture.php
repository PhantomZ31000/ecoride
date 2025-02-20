<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(
            normalizationContext: ['groups' => ['voiture:list']],
            security: "is_granted('ROLE_ADMIN')" 
        ),
        new Get(
            normalizationContext: ['groups' => ['voiture:item']],
            security: "is_granted('ROLE_ADMIN')" 
        ),
        new Post(
            denormalizationContext: ['groups' => ['voiture:create']],
            normalizationContext: ['groups' => ['voiture:item']],
            security: "is_granted('ROLE_ADMIN')" 
        ),
        new Put(
            denormalizationContext: ['groups' => ['voiture:update']],
            security: "is_granted('ROLE_ADMIN')" 
        ),
        new Delete(
            security: "is_granted('ROLE_ADMIN')" 
        )
    ],
)]
#[ApiFilter(SearchFilter::class, properties: ['modele' => 'partial', 'marque' => 'partial'])]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['voiture:list', 'voiture:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['voiture:list', 'voiture:item', 'voiture:create', 'voiture:update'])]
    private ?string $modele = null;

    #[ORM\Column(length: 255)]
    #[Groups(['voiture:list', 'voiture:item', 'voiture:create', 'voiture:update'])]
    private ?string $immatriculation = null;

    #[ORM\Column(length: 255)]
    #[Groups(['voiture:list', 'voiture:item', 'voiture:create', 'voiture:update'])]
    private ?string $energie = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['voiture:list', 'voiture:item', 'voiture:create', 'voiture:update'])]
    private ?string $couleur = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['voiture:list', 'voiture:item', 'voiture:create', 'voiture:update'])]
    private ?string $marque = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['voiture:list', 'voiture:item', 'voiture:create', 'voiture:update'])]
    private ?\DateTimeInterface $premiere_immatriculation = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['voiture:list', 'voiture:item', 'voiture:create', 'voiture:update'])]
    private ?int $nombre_places = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['voiture:list', 'voiture:item', 'voiture:create', 'voiture:update'])]
    private ?User $utilisateur = null;

    #[ORM\OneToMany(targetEntity: Covoiturage::class, mappedBy: 'voiture')]
    #[Groups(['voiture:item'])]
    private Collection $covoiturages;

    public function __construct()
    {
        $this->covoiturages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): static
    {
        $this->modele = $modele;
        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): static
    {
        $this->immatriculation = $immatriculation;
        return $this;
    }

    public function getEnergie(): ?string
    {
        return $this->energie;
    }

    public function setEnergie(string $energie): static
    {
        $this->energie = $energie;
        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): static
    {
        $this->couleur = $couleur;
        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): static
    {
        $this->marque = $marque;
        return $this;
    }

    public function getPremiereImmatriculation(): ?\DateTimeInterface
    {
        return $this->premiere_immatriculation;
    }

    public function setPremiereImmatriculation(?\DateTimeInterface $premiere_immatriculation): static
    {
        $this->premiere_immatriculation = $premiere_immatriculation;
        return $this;
    }

    public function getNombrePlaces(): ?int
    {
        return $this->nombre_places;
    }

    public function setNombrePlaces(?int $nombre_places): static
    {
        $this->nombre_places = $nombre_places;
        return $this;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): static
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    /**
     * @return Collection<int, Covoiturage>
     */
    public function getCovoiturages(): Collection
    {
        return $this->covoiturages;
    }

    public function addCovoiturage(Covoiturage $covoiturage): static
    {
        if (!$this->covoiturages->contains($covoiturage)) {
            $this->covoiturages->add($covoiturage);
            $covoiturage->setVoiture($this);
        }
        return $this;
    }

    public function removeCovoiturage(Covoiturage $covoiturage): static
    {
        if ($this->covoiturages->removeElement($covoiturage)) {
            if ($covoiturage->getVoiture() === $this) {
                $covoiturage->setVoiture(null);
            }
        }
        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\CovoiturageRepository;
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
use ApiPlatform\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Annotation\ApiFilter;

#[ORM\Entity(repositoryClass: CovoiturageRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(
            normalizationContext: ['groups' => ['covoiturage:list']],
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Get(
            normalizationContext: ['groups' => ['covoiturage:item']],
            security: "is_granted('ROLE_ADMIN')"
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['covoiturage:list']],
            paginationItemsPerPage: 10,
            paginationMaximumItemsPerPage: 50,
        ),
        new Get(
            normalizationContext: ['groups' => ['covoiturage:item']]
        ),
        new Post(
            denormalizationContext: ['groups' => ['covoiturage:create']],
            normalizationContext: ['groups' => ['covoiturage:item']]
        ),
        new Put(
            denormalizationContext: ['groups' => ['covoiturage:update']]
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['covoiturage:list']],
            security: "is_granted('ROLE_EMPLOYE')"
        ),
        new Get(
            normalizationContext: ['groups' => ['covoiturage:item']],
            security: "is_granted('ROLE_EMPLOYE')"
        ),
        new Delete()
    ],
    filters: [SearchFilter::class, RangeFilter::class],
)]
#[ApiFilter(SearchFilter::class, properties: ['lieu_depart' => 'partial', 'lieu_arrivee' => 'partial'])]
#[ApiFilter(RangeFilter::class, properties: ['prix'])]
class Covoiturage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    #[Groups(['covoiturage:list', 'covoiturage:item', 'covoiturage:create', 'covoiturage:update'])]
    private ?string $lieu_depart = null;

    #[ORM\Column(type: "string", length: 255)]
    #[Groups(['covoiturage:list', 'covoiturage:item', 'covoiturage:create', 'covoiturage:update'])]
    private ?string $lieu_arrivee = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['covoiturage:list', 'covoiturage:item', 'covoiturage:create', 'covoiturage:update'])]
    private ?\DateTimeInterface $date_depart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Groups(['covoiturage:list', 'covoiturage:item', 'covoiturage:create', 'covoiturage:update'])]
    private ?\DateTimeInterface $heure_depart = null;

    #[ORM\Column(type: "float")]
    #[Groups(['covoiturage:list', 'covoiturage:item', 'covoiturage:create', 'covoiturage:update'])]
    private ?float $prix = null;

    #[ORM\Column(type: "integer")]
    #[Groups(['covoiturage:list', 'covoiturage:item', 'covoiturage:create', 'covoiturage:update'])]
    private ?int $nombre_places_disponibles = null;

    #[ORM\ManyToOne(inversedBy: 'covoituragesConducteur')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['covoiturage:list', 'covoiturage:item', 'covoiturage:create', 'covoiturage:update'])]
    private ?User $conducteur = null;

    #[ORM\ManyToOne(inversedBy: 'covoituragesVoiture')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['covoiturage:list', 'covoiturage:item', 'covoiturage:create', 'covoiturage:update'])]
    private ?Voiture $voiture = null;

    #[ORM\OneToMany(targetEntity: Avis::class, mappedBy: 'covoiturage')]
    #[Groups(['covoiturage:list', 'covoiturage:item'])]
    private Collection $avis;

    public function __construct()
    {
        $this->avis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLieuDepart(): ?string
    {
        return $this->lieu_depart;
    }

    public function setLieuDepart(string $lieu_depart): static
    {
        $this->lieu_depart = $lieu_depart;
        return $this;
    }

    public function getLieuArrivee(): ?string
    {
        return $this->lieu_arrivee;
    }

    public function setLieuArrivee(string $lieu_arrivee): static
    {
        $this->lieu_arrivee = $lieu_arrivee;
        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->date_depart;
    }

    public function setDateDepart(\DateTimeInterface $date_depart): static
    {
        $this->date_depart = $date_depart;
        return $this;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heure_depart;
    }

    public function setHeureDepart(\DateTimeInterface $heure_depart): static
    {
        $this->heure_depart = $heure_depart;
        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;
        return $this;
    }

    public function getNombrePlacesDisponibles(): ?int
    {
        return $this->nombre_places_disponibles;
    }

    public function setNombrePlacesDisponibles(int $nombre_places_disponibles): static
    {
        $this->nombre_places_disponibles = $nombre_places_disponibles;
        return $this;
    }

    public function getConducteur(): ?User
    {
        return $this->conducteur;
    }

    public function setConducteur(?User $conducteur): static
    {
        $this->conducteur = $conducteur;
        return $this;
    }

    public function getVoiture(): ?Voiture
    {
        return $this->voiture;
    }

    public function setVoiture(?Voiture $voiture): static
    {
        $this->voiture = $voiture;
        return $this;
    }

    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): static
    {
        if (!$this->avis->contains($avi)) {
            $this->avis->add($avi);
            $avi->setCovoiturage($this);
        }
        return $this;
    }

    public function removeAvi(Avis $avi): static
    {
        if ($this->avis->removeElement($avi)) {
            if ($avi->getCovoiturage() === $this) {
                $avi->setCovoiturage(null);
            }
        }
        return $this;
    }
}

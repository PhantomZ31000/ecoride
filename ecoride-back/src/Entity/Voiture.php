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

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(
            normalizationContext: ['groups' => ['voiture:list']]
        ),
        new Get(
            normalizationContext: ['groups' => ['voiture:item']]
        ),
        new Post(
            denormalizationContext: ['groups' => ['voiture:create']],
            normalizationContext: ['groups' => ['voiture:item']]
        ),
        new Put(
            denormalizationContext: ['groups' => ['voiture:update']]
        ),
        new Delete()
    ],
    filters: [SearchFilter::class],
)]
#[ApiFilter(SearchFilter::class, properties: ['modele' => 'partial', 'marque' => 'partial'])]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['voiture:list', 'voiture:item', 'voiture:create', 'voiture:update'])]
    protected $modele;

    #[ORM\Column(length: 255)]
    private ?string $immatriculation = null;

    #[ORM\Column(length: 255)]
    private ?string $energie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $couleur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $marque = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $premiere_immatriculation = null;

    #[ORM\Column(nullable: true)]
    private ?int $nombre_places = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $utilisateur = null;

    /**
     * @var Collection<int, Covoiturage>
     */
    #[ORM\OneToMany(targetEntity: Covoiturage::class, mappedBy: 'voiture')]
    private Collection $covoituragesVoiture;

    public function __construct()
    {
        $this->covoituragesVoiture = new ArrayCollection();
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
    public function getCovoituragesVoiture(): Collection
    {
        return $this->covoituragesVoiture;
    }

    public function addCovoituragesVoiture(Covoiturage $covoituragesVoiture): static
    {
        if (!$this->covoituragesVoiture->contains($covoituragesVoiture)) {
            $this->covoituragesVoiture->add($covoituragesVoiture);
            $covoituragesVoiture->setVoiture($this);
        }

        return $this;
    }

    public function removeCovoituragesVoiture(Covoiturage $covoituragesVoiture): static
    {
        if ($this->covoituragesVoiture->removeElement($covoituragesVoiture)) {
            // set the owning side to null (unless already changed)
            if ($covoituragesVoiture->getVoiture() === $this) {
                $covoituragesVoiture->setVoiture(null);
            }
        }

        return $this;
    }
}

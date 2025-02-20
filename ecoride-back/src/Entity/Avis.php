<?php

namespace App\Entity;

use App\Repository\AvisRepository;
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
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(
            normalizationContext: ['groups' => ['avis:list']],
            security: "is_granted('ROLE_EMPLOYE')"
        ),
        new Get(
            normalizationContext: ['groups' => ['avis:item']],
            security: "is_granted('ROLE_USER')"
        ),
        new Post(
            denormalizationContext: ['groups' => ['avis:create']],
            normalizationContext: ['groups' => ['avis:item']],
            security: "is_granted('ROLE_USER')"
        ),
        new Put(
            denormalizationContext: ['groups' => ['avis:update']],
            security: "is_granted('ROLE_EMPLOYE')"
        ),
        new Delete(
            security: "is_granted('ROLE_EMPLOYE')"
        )
    ],
    filters: [SearchFilter::class],
)]
#[ApiFilter(SearchFilter::class, properties: ['commentaire' => 'partial'])]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[Groups(['avis:list', 'avis:item', 'avis:create'])]
    #[Assert\Range(min: 1, max: 5, notInRangeMessage: "La note doit être comprise entre 1 et 5.")]
    #[ORM\Column(type: "integer")]
    private ?int $note = null;

    #[Groups(['avis:list', 'avis:item', 'avis:create'])]
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire = null;

    #[Groups(['avis:list', 'avis:item', 'avis:create'])]
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_avis = null;

    #[Groups(['avis:list', 'avis:item', 'avis:create'])]
    #[ORM\ManyToOne(inversedBy: 'avisPassager')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $passager = null;

    #[Groups(['avis:list', 'avis:item', 'avis:create'])]
    #[ORM\ManyToOne(inversedBy: 'avisConducteur')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $conducteur = null;

    #[Groups(['avis:list', 'avis:item', 'avis:create'])]
    #[ORM\ManyToOne(inversedBy: 'avis')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Covoiturage $covoiturage = null;

    public function __construct()
    {
        $this->date_avis = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;
        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): static
    {
        $this->commentaire = $commentaire;
        return $this;
    }

    public function getDateAvis(): ?\DateTimeInterface
    {
        return $this->date_avis;
    }

    public function setDateAvis(\DateTimeInterface $date_avis): static
    {
        $this->date_avis = $date_avis;
        return $this;
    }

    public function getPassager(): ?User
    {
        return $this->passager;
    }

    public function setPassager(?User $passager): static
    {
        $this->passager = $passager;
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

    public function getCovoiturage(): ?Covoiturage
    {
        return $this->covoiturage;
    }

    public function setCovoiturage(?Covoiturage $covoiturage): static
    {
        $this->covoiturage = $covoiturage;
        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MarqueRepository::class)]
#[ApiResource(
    operations: [
        new Get(
            normalizationContext: ['groups' => ['marque:read']],
            security: "is_granted('ROLE_ADMIN')" // Access control for GET
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['marque:list']],
            security: "is_granted('ROLE_ADMIN')" // Access control for GET Collection
        ),
        new Post(
            denormalizationContext: ['groups' => ['marque:create']],
            normalizationContext: ['groups' => ['marque:item']],
            security: "is_granted('ROLE_ADMIN')" // Access control for POST
        ),
        new Put(
            denormalizationContext: ['groups' => ['marque:update']],
            security: "is_granted('ROLE_ADMIN')" // Access control for PUT
        ),
        new Delete(
            security: "is_granted('ROLE_ADMIN')" // Access control for DELETE
        )
    ],
    normalizationContext: ['groups' => ['marque:read']],
    denormalizationContext: ['groups' => ['marque:create', 'marque:update']]
)]
class Marque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    #[Groups(['marque:read', 'marque:list'])]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    #[Groups(['marque:read', 'marque:create', 'marque:update'])]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }
}

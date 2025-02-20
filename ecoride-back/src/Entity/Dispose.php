<?php

namespace App\Entity;

use App\Repository\DisposeRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DisposeRepository::class)]
#[ApiResource(
    operations: [
        new Get(
            normalizationContext: ['groups' => ['dispose:read']],
            security: "is_granted('ROLE_ADMIN')" // Only accessible by ADMIN users
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['dispose:list']],
            security: "is_granted('ROLE_ADMIN')" // Only accessible by ADMIN users
        ),
        new Post(
            denormalizationContext: ['groups' => ['dispose:create']],
            normalizationContext: ['groups' => ['dispose:item']],
            security: "is_granted('ROLE_ADMIN')" // Only accessible by ADMIN users
        ),
        new Put(
            denormalizationContext: ['groups' => ['dispose:update']],
            security: "is_granted('ROLE_ADMIN')" // Only accessible by ADMIN users
        ),
        new Delete(
            security: "is_granted('ROLE_ADMIN')" // Only accessible by ADMIN users
        )
    ],
    normalizationContext: ['groups' => ['dispose:read']],
    denormalizationContext: ['groups' => ['dispose:create', 'dispose:update']]
)]
class Dispose
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    #[Groups(['dispose:read', 'dispose:list'])]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    #[Groups(['dispose:read', 'dispose:create', 'dispose:update'])]
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

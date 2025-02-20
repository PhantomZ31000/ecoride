<?php

namespace App\Entity;

use App\Repository\ParametreRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ParametreRepository::class)]
#[ApiResource(
    operations: [
        new Get(
            normalizationContext: ['groups' => ['parametre:read']],
            security: "is_granted('ROLE_ADMIN')" // Only accessible by ADMIN users
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['parametre:list']],
            security: "is_granted('ROLE_ADMIN')" // Only accessible by ADMIN users
        ),
        new Post(
            denormalizationContext: ['groups' => ['parametre:create']],
            normalizationContext: ['groups' => ['parametre:item']],
            security: "is_granted('ROLE_ADMIN')" // Only accessible by ADMIN users
        ),
        new Put(
            denormalizationContext: ['groups' => ['parametre:update']],
            security: "is_granted('ROLE_ADMIN')" // Only accessible by ADMIN users
        ),
        new Delete(
            security: "is_granted('ROLE_ADMIN')" // Only accessible by ADMIN users
        )
    ],
    normalizationContext: ['groups' => ['parametre:read']],
    denormalizationContext: ['groups' => ['parametre:create', 'parametre:update']]
)]
class Parametre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    #[Groups(['parametre:read', 'parametre:list'])]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    #[Groups(['parametre:read', 'parametre:create', 'parametre:update'])]
    private ?string $name = null;

    #[ORM\Column(type: "string", length: 255)]
    #[Groups(['parametre:read', 'parametre:create', 'parametre:update'])]
    private ?string $value = null;

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

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;
        return $this;
    }
}

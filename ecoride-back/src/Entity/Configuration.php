<?php

namespace App\Entity;

use App\Repository\ConfigurationRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ConfigurationRepository::class)]
#[ApiResource(
    operations: [
        new Get(
            normalizationContext: ['groups' => ['configuration:read']],
            security: "is_granted('ROLE_ADMIN')" // Access control for GET
        ),
        new Post(
            denormalizationContext: ['groups' => ['configuration:write']],
            normalizationContext: ['groups' => ['configuration:read']],
            security: "is_granted('ROLE_ADMIN')" // Access control for POST
        ),
        new Put(
            denormalizationContext: ['groups' => ['configuration:write']],
            security: "is_granted('ROLE_ADMIN')" // Access control for PUT
        ),
        new Delete(
            security: "is_granted('ROLE_ADMIN')" // Access control for DELETE
        )
    ],
    normalizationContext: ['groups' => ['configuration:read']],
    denormalizationContext: ['groups' => ['configuration:write']]
)]
class Configuration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    #[Groups(['configuration:read'])]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    #[Groups(['configuration:read', 'configuration:write'])]
    private ?string $parameterKey = null;

    #[ORM\Column(type: "string", length: 255)]
    #[Groups(['configuration:read', 'configuration:write'])]
    private ?string $parameterValue = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParameterKey(): ?string
    {
        return $this->parameterKey;
    }

    public function setParameterKey(string $parameterKey): static
    {
        $this->parameterKey = $parameterKey;
        return $this;
    }

    public function getParameterValue(): ?string
    {
        return $this->parameterValue;
    }

    public function setParameterValue(string $parameterValue): static
    {
        $this->parameterValue = $parameterValue;
        return $this;
    }
}

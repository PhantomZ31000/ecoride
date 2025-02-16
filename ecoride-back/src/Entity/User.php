<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[ApiResource(
    operations: [
        new GetCollection(
            normalizationContext: ['groups' => ['user:list']]
        ),
        new Get(
            normalizationContext: ['groups' => ['user:item']]
        ),
        new Post(
            denormalizationContext: ['groups' => ['user:create']],
            normalizationContext: ['groups' => ['user:item']]
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['user:list']],
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Get(
            normalizationContext: ['groups' => ['user:item']],
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Put(
            denormalizationContext: ['groups' => ['user:update']],
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Delete(
            security: "is_granted('ROLE_ADMIN')"
        )
    ],
    filters: [SearchFilter::class],
)]
#[ApiFilter(SearchFilter::class, properties: ['pseudo' => 'partial'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Groups(['user:list', 'user:item', 'user:create'])]
    private string $email;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column(type: 'string')]
    private ?string $password = null;

    #[ORM\Column(type: 'string', length: 100, unique: true)]
    #[Groups(['user:list', 'user:item', 'user:create'])]
    private string $pseudo;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(type: 'string', length: 20)]
    #[Assert\Choice(choices: ['conducteur', 'passager', 'les_deux'])]
    private string $role = 'passager';

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Voiture::class)]
    private Collection $voitures;

    #[ORM\OneToMany(mappedBy: 'conducteur', targetEntity: Covoiturage::class)]
    private Collection $covoituragesConducteur;

    #[ORM\OneToMany(mappedBy: 'passager', targetEntity: Avis::class)]
    private Collection $avisPassager;

    #[ORM\OneToMany(mappedBy: 'conducteur', targetEntity: Avis::class)]
    private Collection $avisConducteur;

    public function __construct()
    {
        $this->voitures = new ArrayCollection();
        $this->covoituragesConducteur = new ArrayCollection();
        $this->avisPassager = new ArrayCollection();
        $this->avisConducteur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles = 'ROLE_USER';

        // Add other roles based on user's role
        if ($this->getRole() === 'employe') {
            $roles = 'ROLE_EMPLOYE';
        }   elseif ($this->getRole() === 'conducteur') {
            $roles = 'ROLE_CONDUCTEUR';
        }   elseif ($this->getRole() === 'passager') {
            $roles = 'ROLE_PASSAGER';
        }   elseif ($this->getRole() === 'admin') {
            $roles = 'ROLE_ADMIN';
        }

        return array_unique($roles);
    }



    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function eraseCredentials(): void
    {
        // Efface les données sensibles temporaires si nécessaire
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }
}

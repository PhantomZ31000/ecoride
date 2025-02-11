<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
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
    ],
    filters: [SearchFilter::class],
)]
#[ApiFilter(SearchFilter::class, properties: ['pseudo' => 'partial'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['user:list', 'user:item', 'user:create'])]
    protected $pseudo;
    
    #[ORM\Column(length: 50, nullable: true)]
    private?string $nom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private?string $prenom = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private?\DateTimeInterface $date_naissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private?string $adresse = null;

    #[ORM\Column(length: 20, nullable: true)]
    private?string $telephone = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $photo = null;

    #[ORM\Column(type: 'string', length: 20)]
    #[Assert\Choice(choices: ['conducteur', 'passager', 'les_deux'])]
    private $role;

    #[Groups(['user:list', 'user:item'])]
    protected $email;
    

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    /**
     * @var Collection<int, Voiture>
     */
    #[ORM\OneToMany(targetEntity: Voiture::class, mappedBy: 'utilisateur')]
    private Collection $voitures;

    /**
     * @var Collection<int, Covoiturage>
     */
    #[ORM\OneToMany(targetEntity: Covoiturage::class, mappedBy: 'conducteur')]
    private Collection $covoituragesConducteur;

    /**
     * @var Collection<int, Avis>
     */
    #[ORM\OneToMany(targetEntity: Avis::class, mappedBy: 'passager')]
    private Collection $avisPassager;

    /**
     * @var Collection<int, Avis>
     */
    #[ORM\OneToMany(targetEntity: Avis::class, mappedBy: 'conducteur')]
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

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPseudo():?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getNom():?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom():?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance():?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getAdresse():?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone():?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, Voiture>
     */
    public function getVoitures(): Collection
    {
        return $this->voitures;
    }

    public function addVoiture(Voiture $voiture): static
    {
        if (!$this->voitures->contains($voiture)) {
            $this->voitures->add($voiture);
            $voiture->setUtilisateur($this);
        }

        return $this;
    }

    public function removeVoiture(Voiture $voiture): static
    {
        if ($this->voitures->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getUtilisateur() === $this) {
                $voiture->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Covoiturage>
     */
    public function getCovoituragesConducteur(): Collection
    {
        return $this->covoituragesConducteur;
    }

    public function addCovoituragesConducteur(Covoiturage $covoituragesConducteur): static
    {
        if (!$this->covoituragesConducteur->contains($covoituragesConducteur)) {
            $this->covoituragesConducteur->add($covoituragesConducteur);
            $covoituragesConducteur->setConducteur($this);
        }

        return $this;
    }

    public function removeCovoituragesConducteur(Covoiturage $covoituragesConducteur): static
    {
        if ($this->covoituragesConducteur->removeElement($covoituragesConducteur)) {
            // set the owning side to null (unless already changed)
            if ($covoituragesConducteur->getConducteur() === $this) {
                $covoituragesConducteur->setConducteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getAvisPassager(): Collection
    {
        return $this->avisPassager;
    }

    public function addAvisPassager(Avis $avisPassager): static
    {
        if (!$this->avisPassager->contains($avisPassager)) {
            $this->avisPassager->add($avisPassager);
            $avisPassager->setPassager($this);
        }

        return $this;
    }

    public function removeAvisPassager(Avis $avisPassager): static
    {
        if ($this->avisPassager->removeElement($avisPassager)) {
            // set the owning side to null (unless already changed)
            if ($avisPassager->getPassager() === $this) {
                $avisPassager->setPassager(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getAvisConducteur(): Collection
    {
        return $this->avisConducteur;
    }

    public function addAvisConducteur(Avis $avisConducteur): static
    {
        if (!$this->avisConducteur->contains($avisConducteur)) {
            $this->avisConducteur->add($avisConducteur);
            $avisConducteur->setConducteur($this);
        }

        return $this;
    }

    public function removeAvisConducteur(Avis $avisConducteur): static
    {
        if ($this->avisConducteur->removeElement($avisConducteur)) {
            // set the owning side to null (unless already changed)
            if ($avisConducteur->getConducteur() === $this) {
                $avisConducteur->setConducteur(null);
            }
        }

        return $this;
    }

}

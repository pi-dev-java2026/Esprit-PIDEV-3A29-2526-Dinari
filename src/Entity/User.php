<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'user')]
#[UniqueEntity(fields: ['email'], message: 'Un compte existe déjà avec cette adresse email.')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\NotBlank(message: 'Le nom complet est obligatoire.')]
    #[Assert\Length(min: 4, max: 100, minMessage: 'Le nom doit contenir au moins {{ limit }} caractères.', maxMessage: 'Le nom ne peut pas dépasser {{ limit }} caractères.')]
    private string $name = '';

    #[ORM\Column(type: 'string', length: 100, unique: true)]
    #[Assert\NotBlank(message: 'L\'adresse email est obligatoire.')]
    #[Assert\Email(message: 'L\'adresse email "{{ value }}" n\'est pas valide.')]
    private string $email = '';

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    #[Assert\Regex(pattern: '/^[0-9\+\s\-]+$/', message: 'Veuillez entrer un numéro de téléphone valide.')]
    #[Assert\Length(min: 8, max: 20, minMessage: 'Le numéro de téléphone doit contenir au moins {{ limit }} caractères.')]
    private ?string $phone = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $password = '';

    #[ORM\Column(type: 'string', length: 100)]
    private string $role = 'User';

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private ?string $reset_code = null;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private ?string $face_image = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $last_login = null;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $created_at;

    #[ORM\Column(type: 'boolean')]
    private bool $isBlockedByAdmin = false;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private ?string $blockReason = null;

    #[ORM\Column(type: 'integer')]
    private int $failedAttempts = 0;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $blockedUntil = null;
    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

    // ---- UserInterface implementation ----

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getRoles(): array
    {
        return ['ROLE_' . strtoupper($this->role)];
    }

    public function eraseCredentials(): void
    {
        // nothing to erase
    }

    // ---- Getters / Setters ----

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(?string $value): self
    {
        $this->name = (string) $value;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(?string $value): self
    {
        $this->email = (string) $value;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $value): self
    {
        $this->phone = $value;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $value): self
    {
        $this->password = (string) $value;
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(?string $value): self
    {
        $this->role = (string) $value;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $reset_expiration = null;

    public function getReset_code(): ?string
    {
        return $this->reset_code;
    }

    public function setReset_code(?string $value): self
    {
        $this->reset_code = $value;
        return $this;
    }

    public function getResetExpiration(): ?\DateTimeInterface
    {
        return $this->reset_expiration;
    }

    public function setResetExpiration(?\DateTimeInterface $reset_expiration): self
    {
        $this->reset_expiration = $reset_expiration;

        return $this;
    }

    public function getFace_image(): ?string
    {
        return $this->face_image;
    }

    public function setFace_image(?string $value): self
    {
        $this->face_image = $value;
        return $this;
    }

    public function getLast_login(): ?\DateTimeInterface
    {
        return $this->last_login;
    }

    public function setLast_login(?\DateTimeInterface $value): self
    {
        $this->last_login = $value;
        return $this;
    }

    public function getCreated_at(): \DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreated_at(\DateTimeInterface $value): self
    {
        $this->created_at = $value;
        return $this;
    }

    public function isBlockedByAdmin(): bool
    {
        return $this->isBlockedByAdmin;
    }

    public function setIsBlockedByAdmin(bool $isBlockedByAdmin): self
    {
        $this->isBlockedByAdmin = $isBlockedByAdmin;
        return $this;
    }

    public function getBlockReason(): ?string
    {
        return $this->blockReason;
    }

    public function setBlockReason(?string $blockReason): self
    {
        $this->blockReason = $blockReason;
        return $this;
    }

    public function getFailedAttempts(): int
    {
        return $this->failedAttempts;
    }

    public function setFailedAttempts(int $failedAttempts): self
    {
        $this->failedAttempts = $failedAttempts;
        return $this;
    }

    public function getBlockedUntil(): ?\DateTimeInterface
    {
        return $this->blockedUntil;
    }

    public function setBlockedUntil(?\DateTimeInterface $blockedUntil): self
    {
        $this->blockedUntil = $blockedUntil;
        return $this;
    }

    /**
     * Returns initials for avatar display (e.g. "MA" for "Mohamed Aziz")
     */
    public function getInitials(): string
    {
        $parts = explode(' ', trim($this->name));
        $initials = '';
        foreach ($parts as $part) {
            if (!empty($part)) {
                $initials .= strtoupper(mb_substr($part, 0, 1));
            }
            if (strlen($initials) >= 2) break;
        }
        return $initials ?: 'U';
    }
}

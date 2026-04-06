<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
#[ORM\Table(name: 'reclamation')]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_reclamation = null;

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\NotBlank(message: 'L\'adresse email est obligatoire.')]
    #[Assert\Email(message: 'L\'adresse email "{{ value }}" n\'est pas valide.')]
    private string $email = '';

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\NotBlank(message: 'Le sujet est obligatoire.')]
    #[Assert\Length(min: 5, max: 100, minMessage: 'Le sujet doit contenir au moins {{ limit }} caractères.', maxMessage: 'Le sujet ne peut pas dépasser {{ limit }} caractères.')]
    private string $subject = '';

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: 'La description est obligatoire.')]
    #[Assert\Length(min: 10, minMessage: 'Veuillez détailler un peu plus votre réclamation (au moins {{ limit }} caractères).')]
    private string $description = '';

    #[ORM\Column(type: 'string', length: 50)]
    private string $statut = 'En attente';

    public function getId_reclamation(): ?int
    {
        return $this->id_reclamation;
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

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(?string $value): self
    {
        $this->subject = (string) $value;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(?string $value): self
    {
        $this->description = (string) $value;
        return $this;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $value): self
    {
        $this->statut = $value;
        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Ignore;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom du client est obligatoire.')]
    private string $nomClient = '';

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le prénom du client est obligatoire.')]
    private string $prenomClient = '';

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'L’email du client est obligatoire.')]
    #[Assert\Email(message: 'Veuillez saisir une adresse email valide.')]
    private string $emailClient = '';

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: 'Le téléphone du client est obligatoire.')]
    #[Assert\Regex(
        pattern: '/^[0-9]{8,15}$/',
        message: 'Le numéro de téléphone doit contenir entre 8 et 15 chiffres.'
    )]
    private string $telephoneClient = '';

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $message = null;

    #[ORM\Column]
    private \DateTimeImmutable $dateReservation;

    #[ORM\Column(length: 50)]
    private string $statut = 'en_attente';

    #[ORM\Column(length: 255)]
    #[Ignore]
    private string $token = '';

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: 'Le mode de réservation est obligatoire.')]
    #[Assert\Choice(
        choices: ['en_ligne', 'presentiel'],
        message: 'Le mode doit être soit "en_ligne" soit "presentiel".'
    )]
    private string $mode = '';

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $roomName = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Assert\NotNull(message: 'L’offre est obligatoire.')]
    private ?Offre $offre = null;

    public function __construct()
    {
        $this->dateReservation = new \DateTimeImmutable();
        $this->statut = 'en_attente';
        $this->token = bin2hex(random_bytes(32));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClient(): string
    {
        return $this->nomClient;
    }

    public function setNomClient(string $nomClient): static
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getPrenomClient(): string
    {
        return $this->prenomClient;
    }

    public function setPrenomClient(string $prenomClient): static
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    public function getEmailClient(): string
    {
        return $this->emailClient;
    }

    public function setEmailClient(string $emailClient): static
    {
        $this->emailClient = $emailClient;

        return $this;
    }

    public function getTelephoneClient(): string
    {
        return $this->telephoneClient;
    }

    public function setTelephoneClient(string $telephoneClient): static
    {
        $this->telephoneClient = $telephoneClient;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getDateReservation(): \DateTimeImmutable
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeImmutable $dateReservation): static
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): static
    {
        $this->token = $token;

        return $this;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function setMode(string $mode): static
    {
        $this->mode = $mode;

        return $this;
    }

    public function getRoomName(): ?string
    {
        return $this->roomName;
    }

    public function setRoomName(?string $roomName): static
    {
        $this->roomName = $roomName;

        return $this;
    }

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): static
    {
        $this->offre = $offre;

        return $this;
    }
}
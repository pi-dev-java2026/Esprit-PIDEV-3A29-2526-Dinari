<?php

namespace App\Entity;

use App\Repository\JustificatifDepenseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JustificatifDepenseRepository::class)]
#[ORM\Table(name: 'justificatif_depense')]
class JustificatifDepense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'idJustificatif', type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 200)]
    private ?string $filepath = null;

    #[ORM\Column(type: Types::STRING, length: 50)]
    private ?string $typefichier = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateajout = null;

    #[ORM\ManyToOne(targetEntity: Depense::class, inversedBy: 'justificatifs')]
    #[ORM\JoinColumn(name: 'idDepense', referencedColumnName: 'id_depense', nullable: false, onDelete: 'CASCADE')]
    private ?Depense $depense = null;

    public function getId(): ?int { return $this->id; }

    public function getFilepath(): ?string { return $this->filepath; }
    public function setFilepath(string $filepath): static { $this->filepath = $filepath; return $this; }

    public function getTypefichier(): ?string { return $this->typefichier; }
    public function setTypefichier(string $typefichier): static { $this->typefichier = $typefichier; return $this; }

    public function getDateajout(): ?\DateTimeInterface { return $this->dateajout; }
    public function setDateajout(\DateTimeInterface $dateajout): static { $this->dateajout = $dateajout; return $this; }

    public function getDepense(): ?Depense { return $this->depense; }
    public function setDepense(?Depense $depense): static { $this->depense = $depense; return $this; }
}

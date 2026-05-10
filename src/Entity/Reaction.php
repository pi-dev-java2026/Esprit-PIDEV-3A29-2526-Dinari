<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "reaction")]
#[ORM\UniqueConstraint(name: "uniq_reaction", columns: ["commentaire_id", "session_id", "emoji"])]
class Reaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
 
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Commentaire::class, inversedBy: "reactions")]
    #[ORM\JoinColumn(name: "commentaire_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private Commentaire $commentaire;

    #[ORM\Column(type: "string", length: 20)]
    private string $emoji = '';

    #[ORM\Column(type: "string", length: 100)]
    private string $sessionId = '';

    public function getId(): ?int { return $this->id; }

    public function getCommentaire(): Commentaire { return $this->commentaire; }
    public function setCommentaire(Commentaire $c): static { $this->commentaire = $c; return $this; }

    public function getEmoji(): string { return $this->emoji; }
    public function setEmoji(string $e): static { $this->emoji = $e; return $this; }

    public function getSessionId(): string { return $this->sessionId; }
    public function setSessionId(string $s): static { $this->sessionId = $s; return $this; }
}

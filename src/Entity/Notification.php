<?php

namespace App\Entity;

use App\Repository\NotificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationRepository::class)]
#[ORM\Table(name: "notification")]
#[ORM\Index(columns: ["session_id"], name: "idx_notif_session")]
class Notification
{
    public const TYPE_SUCCESS = 'success';
    public const TYPE_WARNING = 'warning';
    public const TYPE_INFO    = 'info';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    /** @phpstan-ignore property.unusedType */
    private ?int $id = null;

    #[ORM\Column(type: "text")]
    private string $message = '';

    #[ORM\Column(type: "string", length: 20)]
    private string $type = self::TYPE_INFO;

    #[ORM\Column(name: "is_read", type: "boolean")]
    private bool $isRead = false;

    #[ORM\Column(name: "created_at", type: "datetime")]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(name: "updated_at", type: "datetime", nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(name: "session_id", type: "string", length: 128)]
    private string $sessionId = '';

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }

    public function getMessage(): string { return $this->message; }
    public function setMessage(string $v): static { $this->message = $v; return $this; }

    public function getType(): string { return $this->type; }
    public function setType(string $v): static { $this->type = $v; return $this; }

    public function isRead(): bool { return $this->isRead; }
    public function setIsRead(bool $v): static { $this->isRead = $v; return $this; }

    public function getCreatedAt(): \DateTimeInterface { return $this->createdAt; }

    public function getUpdatedAt(): ?\DateTimeInterface { return $this->updatedAt; }
    public function setUpdatedAt(?\DateTimeInterface $v): static { $this->updatedAt = $v; return $this; }

    public function getSessionId(): string { return $this->sessionId; }
    public function setSessionId(string $v): static { $this->sessionId = $v; return $this; }
}

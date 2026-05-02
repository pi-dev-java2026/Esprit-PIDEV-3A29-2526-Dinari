<?php

namespace App\Entity;

use App\Entity\Trait\BlameableTrait;
use App\Repository\NotificationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * In-app notification scoped to an anonymous browser session.
 *
 * Audit fields (createdBy / updatedBy) come from BlameableTrait.
 * Since the app has no User entity, these store the session ID or "system".
 * Timestamp fields (createdAt / updatedAt) are managed by lifecycle callbacks —
 * no public setters are exposed for them.
 */
#[ORM\Entity(repositoryClass: NotificationRepository::class)]
#[ORM\Table(name: "notification")]
#[ORM\Index(columns: ["session_id"], name: "idx_notif_session")]
#[ORM\HasLifecycleCallbacks]
class Notification
{
    use BlameableTrait;

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

    /**
     * Set once in the constructor via #[ORM\PrePersist].
     * No public setter — immutable after creation.
     */
    #[ORM\Column(name: "created_at", type: "datetime")]
    private \DateTime $createdAt;

    /**
     * Refreshed automatically by #[ORM\PreUpdate].
     * No public setter — managed by Doctrine lifecycle.
     */
    #[ORM\Column(name: "updated_at", type: "datetime", nullable: true)]
    private ?\DateTime $updatedAt = null;

    #[ORM\Column(name: "session_id", type: "string", length: 128)]
    private string $sessionId = '';

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    // ── Lifecycle callbacks ───────────────────────────────────────────────────

    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        if ($this->createdBy === null && $this->sessionId !== '') {
            $this->createdBy = $this->sessionId;
        }
    }

    #[ORM\PreUpdate]
    public function onPreUpdate(): void
    {
        $this->updatedAt = new \DateTime();

        if ($this->sessionId !== '') {
            $this->updatedBy = $this->sessionId;
        }
    }

    // ── Getters / setters ─────────────────────────────────────────────────────

    public function getId(): ?int { return $this->id; }

    public function getMessage(): string { return $this->message; }
    public function setMessage(string $v): static { $this->message = $v; return $this; }

    public function getType(): string { return $this->type; }
    public function setType(string $v): static { $this->type = $v; return $this; }

    public function isRead(): bool { return $this->isRead; }
    public function setIsRead(bool $v): static { $this->isRead = $v; return $this; }

    /** Read-only — set on insert, never changed. */
    public function getCreatedAt(): \DateTime { return $this->createdAt; }

    /** Read-only — set automatically by Doctrine on update. */
    public function getUpdatedAt(): ?\DateTime { return $this->updatedAt; }

    public function getSessionId(): string { return $this->sessionId; }
    public function setSessionId(string $v): static { $this->sessionId = $v; return $this; }
}

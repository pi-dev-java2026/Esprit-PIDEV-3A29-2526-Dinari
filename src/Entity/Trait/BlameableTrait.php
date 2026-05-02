<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provides audit-trail fields for entities that need to track who created/updated a record.
 *
 * Since this project uses anonymous session-based access (no User entity),
 * createdBy and updatedBy store a string identifier (session ID, username, or "system").
 * They are plain VARCHAR columns — not FK relations.
 *
 * Usage: add `use BlameableTrait;` inside any #[ORM\Entity] class.
 * Populate via setCreatedBy() / setUpdatedBy() in your service layer.
 */
trait BlameableTrait
{
    /**
     * Identifier of who created this record (session ID, username, or "system").
     * Set once on creation — should not be changed afterwards.
     */
    #[ORM\Column(name: "created_by", type: "string", length: 100, nullable: true)]
    private ?string $createdBy = null;

    /**
     * Identifier of who last updated this record.
     * Updated by the service layer on each modification.
     */
    #[ORM\Column(name: "updated_by", type: "string", length: 100, nullable: true)]
    private ?string $updatedBy = null;

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    /**
     * Should only be called once at creation time.
     * Subsequent calls are silently ignored to preserve audit integrity.
     */
    public function setCreatedBy(?string $identifier): static
    {
        if ($this->createdBy === null) {
            $this->createdBy = $identifier;
        }
        return $this;
    }

    public function getUpdatedBy(): ?string
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?string $identifier): static
    {
        $this->updatedBy = $identifier;
        return $this;
    }
}

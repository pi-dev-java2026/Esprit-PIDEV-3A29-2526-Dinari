<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait BlameableTrait
{
    #[ORM\Column(name: "created_by", type: "string", length: 100, nullable: true)]
    private ?string $createdBy = null;

    #[ORM\Column(name: "updated_by", type: "string", length: 100, nullable: true)]
    private ?string $updatedBy = null;

    public function getCreatedBy(): ?string { return $this->createdBy; }
    public function setCreatedBy(?string $v): static { $this->createdBy = $v; return $this; }

    public function getUpdatedBy(): ?string { return $this->updatedBy; }
    public function setUpdatedBy(?string $v): static { $this->updatedBy = $v; return $this; }
}

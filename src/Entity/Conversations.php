<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Messages;
use App\Repository\ConversationsRepository;

#[ORM\Entity(repositoryClass: ConversationsRepository::class)]
#[ORM\Table(name: 'conversations')]
class Conversations
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 100)]
    private string $user_email;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $date_creation;

    public function __construct()
    {
        $this->messagess = new ArrayCollection();
        $this->date_creation = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser_email()
    {
        return $this->user_email;
    }

    public function setUser_email($value)
    {
        $this->user_email = $value;
    }

    public function getDate_creation()
    {
        return $this->date_creation;
    }

    public function setDate_creation($value)
    {
        $this->date_creation = $value;
    }

    #[ORM\OneToMany(mappedBy: "conversation_id", targetEntity: Messages::class)]
    private Collection $messagess;

        public function getMessagess(): Collection
        {
            return $this->messagess;
        }
    
        public function addMessages(Messages $messages): self
        {
            if (!$this->messagess->contains($messages)) {
                $this->messagess[] = $messages;
                $messages->setConversation_id($this);
            }
    
            return $this;
        }
    
        public function removeMessages(Messages $messages): self
        {
            if ($this->messagess->removeElement($messages)) {
                // set the owning side to null (unless already changed)
                if ($messages->getConversation_id() === $this) {
                    $messages->setConversation_id(null);
                }
            }
    
            return $this;
        }
}

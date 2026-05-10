<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Conversations;
use App\Repository\MessagesRepository;

#[ORM\Entity(repositoryClass: MessagesRepository::class)]
#[ORM\Table(name: 'message')]
class Messages
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

        #[ORM\ManyToOne(targetEntity: Conversations::class, inversedBy: "messagess")]
    #[ORM\JoinColumn(name: 'conversation_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Conversations $conversation_id;

    #[ORM\Column(type: "string")]
    private string $sender;

    #[ORM\Column(type: "text")]
    private string $content;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $date_message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConversation_id()
    {
        return $this->conversation_id;
    }

    public function setConversation_id($value)
    {
        $this->conversation_id = $value;
    }

    public function getSender()
    {
        return $this->sender;
    }

    public function setSender($value)
    {
        $this->sender = $value;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($value)
    {
        $this->content = $value;
    }

    public function getDate_message()
    {
        return $this->date_message;
    }

  
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Conversations;

#[ORM\Entity]
class Messages
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

        #[ORM\ManyToOne(targetEntity: Conversations::class, inversedBy: "messagess")]
    #[ORM\JoinColumn(name: 'conversation_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Conversations $conversation_id;

    #[ORM\Column(type: "string")]
    private string $sender;

    #[ORM\Column(type: "text")]
    private string $content;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $date_message;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
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

    public function setDate_message($value)
    {
        $this->date_message = $value;
    }
}

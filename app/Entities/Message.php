<?php

namespace App\Entities;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Message implements MessageInterface
{
    use ResourceTrait;

    #[ORM\OneToOne(mappedBy: 'next', targetEntity: Message::class)]
    #[ORM\JoinColumn(name: 'previous_id')]
    private ?MessageInterface $previous = null;

    #[ORM\OneToOne(mappedBy: 'previous', targetEntity: Message::class)]
    #[ORM\JoinColumn(name: 'next_id')]
    private ?MessageInterface $next = null;

    #[ORM\Column(type: Types::STRING, enumType: AnimationTypes::class)]
    private AnimationTypes $animation = AnimationTypes::IMMEDIATE;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'pages')]
    private ?UserInterface $createdBy = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $message = null;

    #[ORM\Column(type: Types::STRING, enumType: MessageTypes::class)]
    private MessageTypes $type = MessageTypes::TEXT;

    public function getPrevious(): ?MessageInterface
    {
        return $this->previous;
    }

    public function setPrevious(?MessageInterface $page): void
    {
        $this->previous = $page;
        $this->previous->setNext($this);
    }

    public function hasPrevious(): bool
    {
        return isset($this->previous);
    }

    public function getNext(): ?MessageInterface
    {
        return $this->next;
    }

    public function setNext(?MessageInterface $page): void
    {
        $this->next = $page;
        $this->next->setPrevious($this);
    }

    public function hasNext(): bool
    {
        return isset($this->next);
    }

    public function getAnimation(): AnimationTypes
    {
        return $this->animation;
    }

    public function setAnimation(AnimationTypes $animation): void
    {
        $this->animation = $animation;
    }

    public function getCreatedBy(): ?UserInterface
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?UserInterface $user): void
    {
        $this->createdBy = $user;
    }

    public function hasCreatedBy(): bool
    {
        return isset($this->createdBy);
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    public function getType(): MessageTypes
    {
        return $this->type;
    }

    public function setType(MessageTypes $type): void
    {
        $this->type = $type;
    }
}

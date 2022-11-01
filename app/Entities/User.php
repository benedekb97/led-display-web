<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class User implements UserInterface
{
    use ResourceTrait;

    #[ORM\Column(type: Types::STRING, unique: true)]
    private ?string $username = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $password = null;

    public function __construct(
        #[ORM\OneToMany(mappedBy: 'createdBy', targetEntity: Message::class)]
        private readonly Collection $messages = new ArrayCollection()
    ){}

    public function getAuthIdentifierName(): string
    {
        return 'id';
    }

    public function getAuthIdentifier(): ?int
    {
        return $this->id;
    }

    public function getAuthPassword(): ?string
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {

    }

    public function getRememberTokenName()
    {
        return null;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function hasMessage(MessageInterface $message): bool
    {
        return $this->messages->contains($message);
    }

    public function addMessage(MessageInterface $message): void
    {
        if (!$this->hasMessage($message)) {
            $this->messages->add($message);
            $message->setCreatedBy($this);
        }
    }

    public function removeMessage(MessageInterface $message): void
    {
        if ($this->hasMessage($message)) {
            $this->messages->removeElement($message);
            $message->setCreatedBy(null);
        }
    }
}

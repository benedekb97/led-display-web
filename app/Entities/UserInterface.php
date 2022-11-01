<?php

namespace App\Entities;

use Doctrine\Common\Collections\Collection;
use Illuminate\Contracts\Auth\Authenticatable;

interface UserInterface extends ResourceInterface, Authenticatable
{
    public function getUsername(): ?string;

    public function setUsername(?string $username): void;

    public function getPassword(): ?string;

    public function setPassword(?string $password): void;

    public function getMessages(): Collection;

    public function hasMessage(MessageInterface $message): bool;

    public function addMessage(MessageInterface $message): void;

    public function removeMessage(MessageInterface $message): void;
}

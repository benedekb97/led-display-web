<?php

namespace App\Entities;

interface MessageInterface extends ResourceInterface
{
    public function getPrevious(): ?MessageInterface;

    public function setPrevious(?MessageInterface $page): void;

    public function hasPrevious(): bool;

    public function getNext(): ?MessageInterface;

    public function setNext(?MessageInterface $page): void;

    public function hasNext(): bool;

    public function getAnimation(): AnimationTypes;

    public function setAnimation(AnimationTypes $animation): void;

    public function getCreatedBy(): ?UserInterface;

    public function setCreatedBy(?UserInterface $user): void;

    public function hasCreatedBy(): bool;

    public function getMessage(): ?string;

    public function setMessage(?string $message): void;

    public function getType(): MessageTypes;

    public function setType(MessageTypes $type): void;
}

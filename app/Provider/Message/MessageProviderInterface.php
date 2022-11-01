<?php

namespace App\Provider\Message;

use App\Entities\MessageInterface;

interface MessageProviderInterface
{
    public function supports(MessageInterface $message): bool;

    public function provide(MessageInterface $message): string;
}

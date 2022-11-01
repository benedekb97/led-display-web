<?php

namespace App\Provider\Message;

use App\Entities\MessageInterface;

abstract class AbstractMessageProvider implements MessageProviderInterface
{
    public function supports(MessageInterface $message): bool
    {
        return $message->getType()->getMessageProvider() === self::class;
    }

    abstract public function provide(MessageInterface $message): string;
}

<?php

namespace App\Provider\Message;

use App\Entities\MessageInterface;

class TextMessageProvider extends AbstractMessageProvider implements MessageProviderInterface
{
    public function provide(MessageInterface $message): string
    {
        // TODO: Implement provide() method.
    }
}

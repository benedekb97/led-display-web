<?php

namespace App\Provider\Message;

use App\Entities\MessageInterface;

class ExchangeRateMessageProvider extends AbstractMessageProvider implements MessageProviderInterface
{
    public function provide(MessageInterface $message): string
    {
        // TODO: Implement provide() method.
    }
}

<?php

namespace App\Provider\Message;

use App\Entities\MessageInterface;
use App\Entities\MessageTypes;

class InformationMessageProvider extends AbstractMessageProvider implements MessageProviderInterface
{
    public function provide(MessageInterface $message): string
    {
        // TODO: Implement provide() method.
    }
}

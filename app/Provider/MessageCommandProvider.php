<?php

namespace App\Provider;

use App\Entities\MessageInterface;
use App\Exceptions\MessageProviderNotFoundException;
use App\Provider\Message\ExchangeRateMessageProvider;
use App\Provider\Message\InformationMessageProvider;
use App\Provider\Message\MessageProviderInterface;
use App\Provider\Message\TextMessageProvider;

class MessageCommandProvider
{
    /** @var array|MessageProviderInterface[] */
    private array $providers;

    public function __construct(
        ExchangeRateMessageProvider $exchangeRateMessageProvider,
        InformationMessageProvider $informationMessageProvider,
        TextMessageProvider $textMessageProvider
    ) {
        $this->providers[] = $exchangeRateMessageProvider;
        $this->providers[] = $informationMessageProvider;
        $this->providers[] = $textMessageProvider;
    }

    /**
     * @param MessageInterface $message
     * @return string
     *
     * @throws MessageProviderNotFoundException
     */
    public function provide(MessageInterface $message): string
    {
        foreach ($this->providers as $provider) {
            if ($provider->supports($message)) {
                return $provider->provide($message);
            }
        }

        throw new MessageProviderNotFoundException(
            sprintf('Could not find message provider for message type %s', $message->getType()->value)
        );
    }
}

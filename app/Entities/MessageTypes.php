<?php

namespace App\Entities;

use App\Provider\Message\ExchangeRateMessageProvider;
use App\Provider\Message\InformationMessageProvider;
use App\Provider\Message\TextMessageProvider;

enum MessageTypes: string
{
    case TEXT = 'text';
    case INFORMATION = 'information';
    case EXCHANGE_RATES = 'exchange_rates';

    public function getMessageProvider(): string
    {
        return match($this) {
            self::TEXT => TextMessageProvider::class,
            self::INFORMATION => InformationMessageProvider::class,
            self::EXCHANGE_RATES => ExchangeRateMessageProvider::class,
        };
    }
}

<?php

namespace App\Services\KafkaService\MessageConsumer;

class WalletMessageConsumer extends MainMessageConsumer
{
    public const KAFKA_TOPIC = 'dev-wallet';

}

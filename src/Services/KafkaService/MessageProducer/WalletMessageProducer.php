<?php

namespace App\Services\KafkaService\MessageProducer;

class WalletMessageProducer extends MainMessageProducer
{
    public const KAFKA_TOPIC = 'dev-wallet';

}

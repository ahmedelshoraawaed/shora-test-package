<?php

namespace App\Services\KafkaService\MessageProducer;

class SSOMessageProducer extends MainMessageProducer
{
    public const KAFKA_TOPIC = 'dev-sso';
}

<?php

namespace App\Services\KafkaService\MessageConsumer;

use App\Services\KafkaService\Consumers\MainConsumer;
use App\Services\KafkaService\Handler\MainHandler;

class MainMessageConsumer
{
    public const KAFKA_TOPIC = 'dev';

    public function __construct()
    {
        (new MainConsumer(static::KAFKA_TOPIC))->consume(new MainHandler());
    }

}

<?php

namespace App\Services\KafkaService\Messages;

use Junges\Kafka\Contracts\KafkaConsumerMessage;
use Junges\Kafka\Contracts\KafkaMessage;

interface MainConsumerMessage extends KafkaMessage
{
    public function getOffset(): ?int;

    public function getTimestamp(): ?int;
}

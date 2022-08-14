<?php

namespace App\Services\KafkaService\Consumers;

use App\Services\KafkaService\Handler\MainHandler;
use App\Services\KafkaService\KafkaMain;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\Log;
use Junges\Kafka\Config\Sasl;

/**
 * @example (new MainConsumer($kafkaTopic))->consume(new MainHandler());
 */

class MainConsumer extends KafkaMain
{
    /**
     * @param MainHandler $handler
     * @return void
     */
    public function consume(MainHandler $handler) : void
    {
        try {
            $group = 'group';
            $consumer = (static::KAFKA_CLASS)::createConsumer(is_array($this->kafkaTopics) ?$this->kafkaTopics : [$this->kafkaTopics],$group,$this->getBrokers());
            $saslConfig = new Sasl($this->getUserName(),$this->getPassword(),$this->getMechanisms(),$this->getProtocol());
            $consumer = $consumer->withSasl($saslConfig);
            $consumer = $consumer->subscribe($this->kafkaTopics);
//            $consumer = $consumer->withConsumerGroupId($group);
            $consumer = $consumer->withSecurityProtocol($this->getProtocol());
            $consumer = $consumer->withHandler($handler);
            $consumer = $consumer->withAutoCommit();
            $consumer = $consumer->build();
            $consumer->consume();

        } catch (Exception $e) {
            Log::info(' kafka consumer errors ',[$e->getMessage()]);
        }

    }
}

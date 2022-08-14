<?php

namespace App\Services\KafkaService\Producers;

use App\Enumerations\SlackErrorNotification;
use App\Services\KafkaService\KafkaMain;
use App\Services\KafkaService\Messages\MainMessage;
use Exception;
use Illuminate\Support\Facades\Log;
use Junges\Kafka\Config\Sasl;

/**
 * @example  new MainProducer($kafkaTopic))->produce(new MainMessage());
 */
class MainProducer extends KafkaMain
{


    /**
     * @param MainMessage $message
     * @return void
     */
    public function produce(MainMessage $message)
    {
        if (is_array($this->kafkaTopics)){
            foreach ($this->kafkaTopics as $kafkaTopic){
                $this->send($message,$kafkaTopic);
            }
        }else{
            $this->send($message,$this->kafkaTopics);
        }

    }

    /**
     * @param MainMessage $message
     * @param $topic
     * @return bool
     */
    public function send(MainMessage $message, $topic) : bool
    {
        try {

            $producer = (static::KAFKA_CLASS)::publishOn($topic);
            $producer = $producer->withDebugEnabled();
            $saslConfig = new Sasl($this->getUserName(),$this->getPassword(),$this->getMechanisms(),$this->getProtocol());
            $producer = $producer->withSasl($saslConfig);
            $producer->withMessage($message);
            SlackErrorNotification::send([' Kafka producer / publisher message  ',json_encode($message->getBody())]);

            return $producer->send();
        }catch (Exception $exception){
            Log::info(' Kafka producer / publisher error  ',[$exception]);
            SlackErrorNotification::send([' Kafka producer / publisher error  '.$exception->getMessage()]);
        }
        return  false;
    }
}

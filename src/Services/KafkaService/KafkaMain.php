<?php

namespace App\Services\KafkaService;
use Junges\Kafka\Facades\Kafka;

class KafkaMain
{
    public const KAFKA_CLASS = Kafka::class;
    protected $brokers;
    protected $kafkaTopics;
    protected $userName;
    protected $password;
    protected $mechanisms;
    protected $protocol;

    public function __construct($kafkaTopic , $brokers = null){
        $this->setBrokers($brokers);
        $this->setKafkaTopics($kafkaTopic);
        $this->setUserName(config('kafka.sasl.user_name'));
        $this->setPassword(config('kafka.sasl.password'));
        $this->setMechanisms(config('kafka.sasl.mechanisms'));
        $this->setProtocol(config('kafka.sasl.protocol'));
    }

    /**
     * @return mixed
     */
    public function getKafkaTopics()
    {
        return $this->kafkaTopics;
    }

    /**
     * @param mixed $kafkaTopics
     */
    public function setKafkaTopics($kafkaTopics): void
    {
        $this->kafkaTopics = $kafkaTopics;
    }

    /**
     * @return mixed
     */
    public function getBrokers()
    {
        return $this->brokers;
    }

    /**
     * @param mixed $brokers
     */
    public function setBrokers($brokers = null): void
    {
        $this->brokers = $brokers ?? config('kafka.brokers');
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getMechanisms()
    {
        return $this->mechanisms;
    }

    /**
     * @param mixed $mechanisms
     */
    public function setMechanisms($mechanisms): void
    {
        $this->mechanisms = $mechanisms;
    }

    /**
     * @return mixed
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param mixed $protocol
     */
    public function setProtocol($protocol): void
    {
        $this->protocol = $protocol;
    }

}

<?php

namespace App\Services\KafkaService\MessageProducer;

use App\Services\KafkaService\Enumerations\MessageBodyEnumeration;
use App\Services\KafkaService\Messages\MainMessage;
use App\Services\KafkaService\Messages\MessageBody;
use App\Services\KafkaService\Producers\MainProducer;

class MainMessageProducer
{
    public const KAFKA_TOPIC = 'dev';

    protected $messageBody;

    protected $type;

    protected $action;


    public function __construct($messageBodyData ,$type = MessageBodyEnumeration::TYPE_EVENT ,$action = '')
    {
        $this->setAction($action);
        $this->setMessageBody($messageBodyData);
        $this->setType($type);
    }

    /**
     * @return MessageBody
     */
    public function createMessageBody(): MessageBody
    {
        return new MessageBody($this->getType(),$this->getMessageBody(),$this->getAction());
    }

    /**
     * @return MainMessage
     */
    public function createMessage(): MainMessage
    {
        $message = new MainMessage(static::KAFKA_TOPIC,0);
        $message->setBodyData($this->createMessageBody());
        return $message;
    }

    /**
     * @return void
     */
    public function publish(){
        (new MainProducer(static::KAFKA_TOPIC))->produce($this->createMessage());
    }

    /**
     * @return mixed
     */
    public function getMessageBody()
    {
        return $this->messageBody;
    }

    /**
     * @param mixed $messageBody
     */
    public function setMessageBody($messageBody): void
    {
        $this->messageBody = $messageBody;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }


}

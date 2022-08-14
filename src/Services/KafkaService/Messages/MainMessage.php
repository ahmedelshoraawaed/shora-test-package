<?php

namespace App\Services\KafkaService\Messages;
use App\Services\KafkaService\interfaces\MessageInterface;
use Junges\Kafka\Message\Message;

class MainMessage extends Message implements MessageInterface
{
    protected string $type;
    protected  $bodyData;

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getBodyData()
    {
        return $this->bodyData;
    }

    /**
     * @param mixed $bodyData
     */
    public function setBodyData(MessageBody $bodyData): void
    {
        $this->withBody($bodyData->getBodyData());
    }


}

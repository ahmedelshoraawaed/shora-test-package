<?php

namespace App\Services\KafkaService\Messages;

use App\Services\KafkaService\interfaces\MessageBodyInterface;

class MessageBody implements  MessageBodyInterface
{

    protected string $type;
    protected $data;
    protected $action;

    public function __construct($type, $data, $action)
    {
        $this->setType($type);
        $this->setData($data);
        $this->setAction($action);
    }

    /**
     * @return array
     */
    public function getBodyData() : array
    {
        return get_object_vars($this);
    }


    /**
     * @return string
     */
    public function getType():string
    {
        return $this->type;
    }

    /**
     * @param $type
     * @return void
     */
    public function setType($type) : void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $data
     * @return void
     */
    public function setData($data) : void
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param $action
     * @return void
     */
    public function setAction($action) : void
    {
        $this->action = $action;
    }

}

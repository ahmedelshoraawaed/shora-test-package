<?php

namespace App\Services\KafkaService\interfaces;

interface MessageBodyInterface
{
    public function __construct($type,$data,$action);

    /**
     * @return array
     */
    public function getBodyData() : array;

    /**
     * @return string
     */
    public function getType() : string;

    /**
     * @param $type
     * @return mixed
     */
    public function setType($type);

    /**
     * @return mixed
     */
    public function getData();

    /**
     * @param $data
     * @return mixed
     */
    public function setData($data);

    /**
     * @return mixed
     */
    public function getAction();

    /**
     * @param $action
     * @return mixed
     */
    public function setAction($action);


}

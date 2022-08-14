<?php

namespace App\Services\KafkaService\Handler;
use App\Enumerations\SlackErrorNotification;
use Illuminate\Support\Facades\Log;
use Junges\Kafka\Contracts\KafkaConsumerMessage;


final class MainHandler
{

    public const TYPE_EVENT = 'event';
    public const TYPE_JOB = 'job';

    protected $action;
    protected $data;
    protected $type;

    public function __invoke(KafkaConsumerMessage $message){
        $messageBody = $message->getBody();
        $this->mapMessageBody($messageBody);
        $this->handleMessage();
    }

    /**
     * @return void
     */
    public function handleMessage(){
        if($this->getType() == self::TYPE_EVENT){
            $event = $this->getEventClass($this->getAction());
            event( new $event($this->getData()));
        }elseif($this->getType() == self::TYPE_JOB){
            $jobClassName = $this->getJobClass($this->getAction());
            $jobObject = new $jobClassName($this->getData());
            $jobObject::dispatch();
        }
    }

    /**
     * @param $action
     * @return string|null
     */
    public function getJobClass($action): ?string
    {
        return $this->jobsList()[$action] ?? null;
    }

    /**
     * @return string[]
     */
    public function jobsList():array
    {
        return [
            'sendInvestorInvitation'=>'InvestorInvitationJob',
        ];
    }

    /**
     * @param $action
     * @return string|null
     */
    public function getEventClass($action): ?string
    {
        return $this->eventList()[$action] ?? null;
    }
    /**
     * @return string[]
     */
    public function eventList():array
    {
        return [
//            'eventName'=>'EventClassName',
        ];
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

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
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
     * @param $messageBody
     * @return void
     */
    private function mapMessageBody($messageBody): void
    {
        $this->setAction($messageBody['action'] ?? '');
        $this->setData($messageBody['data'] ?? '');
        $this->setType($messageBody['type'] ?? '');
    }
}

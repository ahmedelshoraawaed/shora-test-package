<?php

namespace App\Services\KafkaService\Handler;

use App\Services\KafkaService\Messages\MainMessage;
use Illuminate\Support\Facades\Log;

class TestHandler extends MainHandler
{
    public function __invoke(MainMessage $message)
    {
        // Handle your message here
        Log::info(' kafka message __invoke ############ ', [$message->getBody()]);

    }
}

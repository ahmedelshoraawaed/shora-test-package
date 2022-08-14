<?php

namespace App\Services\KafkaService\Enumerations;

use Illuminate\Support\Facades\Log;

class MessageBodyEnumeration extends MainEnumeration
{
    public const TYPE_EVENT = 'event';
    public const TYPE_JOB = 'job';


    /**
     * @return array
     */
    public static function getList() : array
    {
        $enumerationTranslation = 'Enumeration.general_default_';

        return [
            self::TYPE_EVENT => __($enumerationTranslation.self::TYPE_EVENT),
            self::TYPE_JOB => __($enumerationTranslation.self::TYPE_JOB),
        ];
    }

    /**
     * @param $value
     * @return bool
     */
    public static function  isEvent($value):bool
    {
        return self::is($value,'TYPE_EVENT');
    }

    /**
     * @param $value
     * @return bool
     */
    public static function  isJob($value):bool
    {
        return self::is($value,'TYPE_JOB');
    }


}

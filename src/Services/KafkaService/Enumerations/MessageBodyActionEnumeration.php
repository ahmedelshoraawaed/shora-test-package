<?php

namespace App\Services\KafkaService\Enumerations;

use Illuminate\Support\Facades\Log;

class MessageBodyActionEnumeration extends MainEnumeration
{
    public const ACTION_CREATE_WALLET = 'createWallet';


    /**
     * @return array
     */
    public static function getList() : array
    {
        $enumerationTranslation = 'Enumeration.general_default_';

        return [
            self::ACTION_CREATE_WALLET => __($enumerationTranslation.self::ACTION_CREATE_WALLET),
        ];
    }

    /**
     * @param $value
     * @return bool
     */
    public static function  isCreateWallet($value):bool
    {
        return self::is($value,'ACTION_CREATE_WALLET');
    }



}

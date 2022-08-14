<?php

namespace App\Services\KafkaService\Enumerations;

use Illuminate\Support\Facades\Log;

class MainEnumeration
{

    /**
     * @param string $value
     * @param string $constant
     * @return bool
     */

    public static function is(string $value, string $constant) : bool
    {
        return self::getConstantValue($constant) === $value;
    }

    /**
     * @param string $constant
     * @return mixed
     */
    public static function getConstantValue(string $constant)
    {
        try {
            $constant_reflex = new \ReflectionClassConstant(__CLASS__, $constant);
            return $constant_reflex->getValue();
        } catch (\Exception $e) {
            Log::error($e);
        }
        return null;
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function checkConstantValueExists(string $value): bool
    {
        return in_array($value, static::getList(), true);
    }

    /**
     * @param string $value
     * @return string
     */
    public static function getConstantTranslation(string $value = '') : string
    {
        $list = static::getList();
        if($value !== '' && isset($list[$value])) {
            return $list[$value];
        }
        return '';
    }
}

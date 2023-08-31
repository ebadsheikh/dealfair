<?php

namespace App\Traits;

use ReflectionClass;

trait EnumToArrayTrait
{
    /**
     * Convert the class constants to an array.
     *
     * This method uses reflection to retrieve the constants defined in the class.
     *
     * @return array An array containing the class constants.
     */
    public static function toArray(): array
    {
        $reflectionClass = new ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }

    public static function toValuesArray(): array
    {
        $reflectionClass = new ReflectionClass(static::class);
        return array_column($reflectionClass->getConstants(), 'value');
    }
}

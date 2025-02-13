<?php
declare(strict_types=1);

namespace App\Model\Contracts;

abstract class ModelAbstract implements Model
{
    /**
     * Returns child name class, when inheritance is used
     */
    public static function getClassName(): string
    {
        $class = explode("\\", get_called_class());
        return $class[count($class) - 1];
    }

    public static function doesFieldExist(string $string): bool
    {
        return property_exists(self::getClassName(), $string);
    }

    public static function getFields(): array
    {
        return get_class_vars(self::getClassName());
    }
}
<?php
declare(strict_types=1);

namespace App\src;

use Exception;

class Singleton
{
    private static ?Singleton $instance = null;

    /**
     * Create instance only if it is the first time, otherwise return existing instance
     */
    public static function getInstance(): Singleton
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Prevent the creation of new object instances
     */
    private function __construct()
    {
    }

    /**
     * Prevent instance from being cloned, which would create a second instance
     */
    private function __clone()
    {
    }

    /**
     * Prevent from being unserialized, which would create a second instance of it
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }

}
<?php
declare(strict_types=1);

namespace App\Core\Database;

use Exception;

class DatabaseConfig
{
    public const DB_NAME = 'DB_NAME';
    public const DB_HOST = 'DB_HOST';
    public const DB_USER = 'DB_USER';
    public const DB_PASS = 'DB_PASS';

    private static ?array $configuration = null;

    /**
     * @throws Exception
     */
    public static function get(string $key): string
    {
        self::parseFile();
        return self::$configuration[$key];
    }

    /**
     * @throws Exception
     */
    private static function parseFile(): void
    {
        if (is_array(self::$configuration)) {
            return;
        }

        $fileData = parse_ini_file(__DIR__ . "/../../Config/database.ini");
        if (!is_array($fileData)) {
            throw new Exception ('Could not read configuration');
        }

        self::$configuration = $fileData;
    }
}
<?php
declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;
use Exception;

class MySQLDatabaseConnection implements PDODatabaseConnection
{
    private static ?self $instance = null;
    private PDO $pdo;

    private function __construct()
    {
        $dbName = DatabaseConfig::get(DatabaseConfig::DB_NAME);
        $dbHost = DatabaseConfig::get(DatabaseConfig::DB_HOST);
        $dbUser = DatabaseConfig::get(DatabaseConfig::DB_USER);
        $dbPass = DatabaseConfig::get(DatabaseConfig::DB_PASS);

        $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $dbUser, $dbPass, $options);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new MySQLDatabaseConnection();
        }

        return self::$instance->pdo;
    }
}
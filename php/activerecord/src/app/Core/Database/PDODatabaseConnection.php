<?php
declare(strict_types=1);

namespace App\Core\Database;

use PDO;
interface PDODatabaseConnection
{
    public static function getInstance(): PDO;
}
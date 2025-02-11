<?php
declare(strict_types=1);

namespace App\Core\Database;

use PDO;

/**
 * TODO: Revise abstract, it was not created properly
 */
interface PDODatabaseConnection
{
    public static function getInstance(): PDO;
}
<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database\ActiveRecordModel;
use App\Core\Database\MySQLDatabaseConnection;

/**
 * Dynamically created properties should be added here
 * so that the IDE can easily recognize them
 *
 * @property mixed|string $description
 * @property int|mixed $bar_code
 */
class Product extends ActiveRecordModel
{
    public function __construct()
    {
        static::setConnection(MySQLDatabaseConnection::getInstance());
        static::setTable('product');
    }

    /**
     * If the 'id' is set in $data
     * we assume that this is an UPDATE operation, otherwise it is a CREATE operation
     * TODO: Move more code to the abstract
     */
    public function save(): bool
    {
        $sql = empty($this->data['id']) ? $this->buildSqlForCreate() : $this->buildSqlForUpdate();
        $result = self::$connection->prepare($sql);

        // If UPDATE, bind id
        if ($this->data['id']) {
            $result->bindParam(':id', $this->data['id'], \PDO::PARAM_INT);
        }

        return $result->execute($this->data);
    }

    private function buildSqlForCreate(): string
    {
        return "INSERT INTO product (description, bar_code) VALUES (:description, :bar_code)";
    }

    private function buildSqlForUpdate(): string
    {
        return "UPDATE product SET description = :description, bar_code = :bar_code WHERE id = :id";
    }

}

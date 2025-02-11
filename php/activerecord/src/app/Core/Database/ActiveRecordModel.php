<?php
declare(strict_types=1);

namespace App\Core\Database;

use PDO;

/**
 * ActiveRecord
 *
 * How it works:
 * The models are directly connected to the database 1:1 relation
 * Model properties can be dynamically created/retrieved
 * When the save() operation is triggered, whatever we added to the model via the dynamic setter __set()
 * will be sent to the database
 *
 * Main intent:
 * Create generic persistence methods that connect the model with the database
 */
abstract class ActiveRecordModel
{
    protected static PDO $connection;
    protected static string $table;

    /**
     * $data is protected
     * because it needs to be visible in the child classes (the models) that implement the ActiveRecordModel
     * in order to customize the save() method
     */
    protected array $data;

    /**
     * Magic getter
     *
     * It allows the dynamic property retrieval
     * Before 8.2 this would work without __get and __set, but with 8.2 it throws an E_DEPRECATED
     * This is required because in ActiveRecord, we have a 1:1 relation with the database
     */
    public function __get(String $key): mixed
    {
        return $this->data[$key];
    }

    /**
     * Magic setter
     *
     * It allows the dynamic property creation
     * Before 8.2 this would work without __get and __set, but with 8.2 it throws an E_DEPRECATED
     * This is required because in ActiveRecord, we have a 1:1 relation with the database
     */
    public function __set(String $key, mixed $value)
    {
        $this->data[$key] = $value;
    }

    protected static function setConnection(PDO $connection): void
    {
        self::$connection = $connection;
    }

    protected static function setTable(string $table): void
    {
        self::$table = $table;
    }

    public static function find(int $id)
    {
        $sql = sprintf("SELECT * FROM %s WHERE id = :id", static::$table);

        $result = self::$connection->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();

        /**
         * get_called_class() is the class of the class implementing this abstract, i.e. the actual model
         * thus, the returned result, will be in the form of that object/model
         */

        return $result->fetchObject(
            get_called_class()
        );
    }

    /**
     * Save model into database
     * based on the dynamically created properties via __set()
     *
     * This has to be implemented by all domain models
     * because it needs to know the database properties specific to the model
     * which are different depending on the domain model
     */
    abstract public function save(): bool;

}

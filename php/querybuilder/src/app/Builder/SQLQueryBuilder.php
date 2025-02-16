<?php
declare(strict_types=1);

namespace App\Builder;

use App\Model\SQLQuery;

class SQLQueryBuilder implements QueryBuilderInterface
{
    private SQLQuery $query;

    public function __construct()
    {
        $this->query = new SQLQuery();
    }

    public function select(string $table, array $columns): QueryBuilderInterface
    {
        $this->query->setSelect("SELECT ". implode( ", ", $columns) . " FROM " . $table);
        return $this;
    }

    public function where(string $column, string $operator, $value): QueryBuilderInterface
    {
        $query =
            $this->query->getWhere() === null ?
            " WHERE $column $operator $value" :
            $this->query->getWhere() . " AND WHERE $column $operator $value";

        $this->query->setWhere($query);
        return $this;
    }

    public function orderBy(string $column, string $direction): QueryBuilderInterface
    {
        $this->query->setOrderBy(" ORDER BY " . $column  . " " . $direction);
        return $this;
    }

    public function get(): string
    {
        $query = "";

        if ($this->query->getSelect() !== null) {
            $query .= $this->query->getSelect();
        }

        if ($this->query->getWhere() !== null) {
            $query .= $this->query->getWhere();
        }

        if ($this->query->getOrderBy() !== null) {
            $query .= $this->query->getOrderBy();
        }

        return $query;
    }

}
<?php
declare(strict_types=1);

namespace App\Src;

class SimpleQueryBuilder
{
    private array $from = [];
    private array $where = [];
    private array $fields = [];

    public function select (array $fields): SimpleQueryBuilder
    {
        $this->fields = $fields;
        return $this;
    }

    public function where (string $condition): SimpleQueryBuilder
    {
        $this->where[] = $condition;
        return $this;
    }

    public function from (string $table, string $alias): SimpleQueryBuilder
    {
        $this->from[] = $table . ' AS ' . $alias;
        return $this;
    }

    public function __toString(): string
    {
        return sprintf(
            'SELECT %s FROM %s WHERE %s',
            join (', ', $this->fields),
            join (',', $this->from),
            join (' AND ', $this->where)
        );
    }
}
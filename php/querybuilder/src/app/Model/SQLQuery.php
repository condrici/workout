<?php
declare(strict_types=1);

namespace App\Model;

/**
 * Custom model is used for the Query, instead of a generic stdClass,
 * because with a stdClass, PHPStorm cannot show the PHPDoc properties
 * since they are dynamically created
 * alternatively, a custom class with __get() and __set() can be used
 */
class SQLQuery
{
    public ?string $select = null;
    public ?string $where = null;
    public ?string $orderBy = null;

    public function getSelect(): ?string
    {
        return $this->select;
    }

    public function setSelect(string $select): void
    {
        $this->select = $select;
    }

    public function getWhere(): ?string
    {
        return $this->where;
    }

    public function setWhere(string $where): void
    {
        $this->where = $where;
    }

    public function getOrderBy(): ?string
    {
        return $this->orderBy;
    }

    public function setOrderBy(string $orderBy): void
    {
        $this->orderBy = $orderBy;
    }
}
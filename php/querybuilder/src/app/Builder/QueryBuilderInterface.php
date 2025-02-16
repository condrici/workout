<?php
declare(strict_types=1);

namespace App\Builder;

interface QueryBuilderInterface
{
    public function select(string $table, array $columns): QueryBuilderInterface;
    public function where(string $column, string $operator, $value): QueryBuilderInterface;
    public function orderBy(string $column, string $direction): QueryBuilderInterface;
    public function get(): string;
}
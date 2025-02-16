<?php
declare(strict_types=1);

use App\Builder\SQLQueryBuilder;

require_once (__DIR__ . "/vendor/autoload.php");

$queryBuilder = new SQLQueryBuilder();

$queryBuilder->select("table_x", ["column_a", "column_b"]);
$queryBuilder->where("columnA", ">", 5);
$queryBuilder->orderBy("columnA", "ASC");

var_dump($queryBuilder->get());
exit();
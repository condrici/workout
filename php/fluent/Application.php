<?php
declare(strict_types=1);

namespace App;

use App\Src\SimpleQueryBuilder;

require_once ("vendor/autoload.php");

$query = new SimpleQueryBuilder();

$query->select(['firstName', 'lastName']);
$query->from('user_table', 'users');
$query->where("firstname === John");

echo $query;


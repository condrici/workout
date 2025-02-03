<?php
declare(strict_types=1);

namespace App;

require_once ("vendor/autoload.php");

use App\src\StorageAdapter;
use App\src\UserMapper;

$data = [
    1 => [
        'username' => 'Agent Smith',
        'email' => 'example@example.com'
    ]
];

$adapter = new StorageAdapter($data);
$mapper  = new UserMapper($adapter);
$user = $mapper->findById(1);


print_r($user);


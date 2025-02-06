<?php
declare(strict_types=1);

namespace App\Src;

use App\Src\Database\BaseStorageAdapter;
use App\src\Mediators\UserRepositoryUiMediator;
use App\Src\Models\User\UserMapper;
use App\Src\Repository\UserRepository;
use App\Src\Services\UiService;

require_once ("vendor/autoload.php");

$data = [
    1 => [
        'firstName' => 'Agent',
        'lastName' => 'Smith'
    ]
];

/**
 * Layer: Data Access
 */

$storageAdapter = new BaseStorageAdapter($data);
$userMapper = new UserMapper($storageAdapter);

$ui = new UserRepositoryUiMediator(
    new UserRepository($userMapper),
    new UiService()
);

/**
 * Layer: Presentation
 */

$user = $ui->getFullUsername(1);

echo PHP_EOL;
print_r($user);
echo PHP_EOL . PHP_EOL;
<?php
declare(strict_types=1);

require_once (__DIR__ . "/../vendor/autoload.php");

use App\Storage\InMemoryStorage;
use App\Model\Post;
use App\Repository\PostRepository;
use App\Model\Mapper\PostMapper;

/**
 * Step 1
 * Data and dependencies
 */

$userInputData = [
    'type' => Post::getClassName(),
    'name' => 'test'
];

// $storage (via GenericStorage interface) should be replaceable with a database

$storage = new InMemoryStorage();
$postMapper = new PostMapper($storage);
$repository = new PostRepository($postMapper);

/**
 * Step 2: Create item in persistent storage
 * TODO: Add validation in the storage
 */
$createdItem = $storage->create($userInputData);
print_r($createdItem);

/**
 * Step 2: Retrieve <raw item> from persistent storage
 */

$findStorage = $storage->retrieve(1);
print_r($findStorage);

/**
 * Step 3: Retrieve <domain model item> from repository
 * If the 'type' used in the $data is not valid, there will be nothing returned <null>
 */

$findRepo = $repository->find(1);
print_r($findRepo);
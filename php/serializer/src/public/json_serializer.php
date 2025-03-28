<?php
declare(strict_types=1);

use App\JsonSerializer;
use App\Strategy\DefaultJsonStrategy;

require_once (__DIR__ . '/../vendor/autoload.php');

$serializerStrategy = new DefaultJsonStrategy();
$serializer = new JsonSerializer($serializerStrategy);

$test = new stdClass();
$test->name = 'demo name';

$json = $serializer->serialize($test);
var_dump($json);
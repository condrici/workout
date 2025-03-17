<?php
declare(strict_types=1);

use App\NativeSerializer;

require_once (__DIR__ . '/../vendor/autoload.php');

$instance = new stdClass();
$instance2 = new stdClass();

$instance2->name = 'some name';

$instance->name = 'some other name';
$instance->dependency = $instance2;

$serializer = new NativeSerializer();
var_dump($serializer->serialize($instance));

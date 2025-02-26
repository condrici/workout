<?php
declare(strict_types=1);

require_once __DIR__ ."/../vendor/autoload.php";

use App\PublishSubscribe\Events\UpdateEvent;
use App\PublishSubscribe\Dispatcher;
use App\PublishSubscribe\Listeners\EchoListener;

$dispatcher = new Dispatcher();
$echoListener = new EchoListener();
$resourceName = 'RandomResource';

/**
 * Step 1.
 *
 * Add listeners
 * The eventName should be the class name used for the Event object at step 2
 */

$dispatcher->subscribe(
    $echoListener, $resourceName, 'UpdateEvent'
);


/**
 * Step 2.
 *
 * Create event and publish it
 */

$event = new UpdateEvent($resourceName);
$dispatcher->publish($event);
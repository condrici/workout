<?php
declare(strict_types=1);

namespace App\Src;

require_once ("vendor/autoload.php");

use App\src\WorkerPool;

$pool = new WorkerPool();
$worker1 = $pool->get();
$pool->dispose($worker1);
$worker2 = $pool->get();

/**
 * Worker1 is the same as Worker2
 * because Worker1 was disposed (made available again) before we got Worker2
 */

var_dump ($worker1 === $worker2);
echo $worker1->run("test");
echo PHP_EOL;
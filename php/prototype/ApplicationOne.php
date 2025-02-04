<?php
declare(strict_types=1);

namespace App\src;

ini_set('memory_limit', '2048M');

require_once ("vendor/autoload.php");

/**
 * New object creation seems to always be faster compared to clone
 * Execution speed in loops is only impacted by
 * whether we have to use setters and how many times
 */

$book1 = new HarryPotterBook();

$copies = 10000000;

$time_start = microtime(true);
$collection = [];
for ($i=0; $i<$copies; $i++) {
    $book = clone $book1;
    $book->setPages(100);
    $collection[] = $book;
}
$time_end = microtime(true);
$execution_time1 = ($time_end - $time_start)/60;
echo $execution_time1 . PHP_EOL;

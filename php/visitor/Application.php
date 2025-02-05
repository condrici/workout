<?php
declare(strict_types=1);

namespace App\src;

require_once ("vendor/autoload.php");

$user = new User('Agent Smith');

$recordingVisitor = new RecordingVisitor();
$recordingVisitor->visitUser($user);

print_r($recordingVisitor->getVisited());
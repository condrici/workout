<?php
declare(strict_types=1);

namespace App;

use App\Src\Context;
use App\Src\Strategy\Factory\BaseStrategyFactory;
use Exception;

require_once ("vendor/autoload.php");

class Application
{
    public function __construct(public Context $context)
    {
    }

    /**
     * @throws Exception
     */
    public function execute (string $action, int $a, int $b): int
    {
        $this->context->setStrategyBasedOnAction($action);

        return $this->context->executeStrategy($a, $b);
    }
}

$strategyFactory = new BaseStrategyFactory();
$context = new Context($strategyFactory);
$app = new Application($context);

/**
 * Test strategy
 */

echo PHP_EOL;
$result = $app->execute('subtract', 10, 5);
print_r($result);
echo PHP_EOL;echo PHP_EOL;
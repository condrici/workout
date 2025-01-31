<?php
declare(strict_types=1);

namespace App\Src;

use App\src\Strategy\Strategy;
use App\Src\Strategy\Factory\StrategyFactory;
use Exception;

class Context
{

    public function __construct(private readonly StrategyFactory $strategyFactory)
    {
    }

    private Strategy $strategy;

    public function setStrategy(Strategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    /**
     * @throws Exception
     */
    public function setStrategyBasedOnAction(string $action): void
    {
        $strategy = $this->strategyFactory->createByAction($action);
        $this->setStrategy($strategy);
    }

    public function executeStrategy(int $a, int $b): int
    {
        return $this->strategy->execute($a, $b);
    }
}
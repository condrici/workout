<?php
declare(strict_types=1);

namespace App\Src;

use Exception;

use App\src\Strategy\Strategy;
use App\Src\Strategy\StrategyService;

class Context
{

    public function __construct(private readonly StrategyService $strategyService)
    {
    }

    private Strategy $strategy;

    public function setStrategy(Strategy $strategy): void
    {
        $this->strategy = $strategy;
    }
''
    /**
     * @throws Exception
     */
    public function setStrategyBasedOnAction(string $action): void
    {
        $strategy = $this->strategyService->findByActionOrThrow($action);
        $this->setStrategy($strategy);
    }

    public function executeStrategy(int $a, int $b): int
    {
        return $this->strategy->execute($a, $b);
    }
}
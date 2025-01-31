<?php
declare(strict_types=1);

namespace App\Src\Strategy\Factory;

use Exception;

use App\Src\Strategy\Strategy;

class BaseStrategyFactory implements StrategyFactory
{

    /*
     * All concrete strategy classes should use this prefix
     * in order to be automatically identified based on what follows after the prefix
     * i.e. ConcreteStrategyAdd is the class, while "add" is the action that can be used
     */
    private const BASE_STRATEGY_NAMESPACE = 'App\\Src\\Strategy\\ConcreteStrategy';

    /**
     * @throws Exception
     */
    public function createByAction(string $action): Strategy
    {
        $namespace = self::BASE_STRATEGY_NAMESPACE . ucfirst(strtolower($action));

        if (class_exists($namespace)) {
            return new $namespace;
        }

        throw new Exception('Cannot find strategy for this action: ');
    }
}
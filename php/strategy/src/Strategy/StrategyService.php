<?php
declare(strict_types=1);

namespace App\Src\Strategy;

use Exception;

class StrategyService
{

    /*
     * All concrete strategy classes should use this prefix
     * in order to be automatically identified based on what follows after the prefix
     * i.e. ConcreteStrategyAdd is the class, while "add" is the action that can be used
     */
    private const CONCRETE_STRATEGY_CLASS_PREFIX = 'ConcreteStrategy';

    /**
     * @throws Exception
     */
    public function findByActionOrThrow(string $action): Strategy
    {
        $namespace = __NAMESPACE__ . '\\' . self::CONCRETE_STRATEGY_CLASS_PREFIX . ucfirst(strtolower($action));
        if (class_exists($namespace)) {
            return new $namespace;
        }

        throw new Exception('Cannot find strategy for this action: ');
    }
}
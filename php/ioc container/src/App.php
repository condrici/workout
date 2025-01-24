<?php
declare(strict_types=1);

namespace App\Src;

class App
{
    public function __construct(
        protected ConfigInterface $config,
        protected string $arg1,
        protected string $arg2,
    ) {}

    public function handle(ConfigInterface $config, string $arg1, string $arg2):string {
        return sprintf(
            "You are inside the handle method injected with object %s \$arg1=%s and \$arg2=%s",
            (new \ReflectionClass($config))->getName(),
            $arg1,
            $arg2
        );
    }
}

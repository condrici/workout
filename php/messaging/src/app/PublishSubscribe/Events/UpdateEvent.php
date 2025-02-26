<?php
declare(strict_types=1);

namespace App\PublishSubscribe\Events;

use App\PublishSubscribe\Contracts\EventAbstract;

class UpdateEvent extends EventAbstract
{
    public function __construct(string $resourceName, ?array $data = null)
    {
        $classNameWithNamespace = get_class($this);

        $classNameWithoutNamespace = substr(
            $classNameWithNamespace,
            strrpos($classNameWithNamespace, '\\') +1
        );

        parent::__construct($resourceName, $classNameWithoutNamespace, $data);
    }
}
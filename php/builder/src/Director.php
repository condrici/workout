<?php
declare(strict_types=1);

namespace App\Src;

use App\src\Vehicle\Type\Vehicle;

class Director
{
    public function build (Builder $builder): Vehicle
    {
        $builder->createVehicle();

        $builder->addDoors();
        $builder->addEngine();
        $builder->addWheel();

        return $builder->getVehicle();
    }
}
<?php
declare(strict_types=1);

namespace App\Src;

use App\src\Vehicle\Type\Car;
use App\src\Vehicle\Type\Vehicle;
use App\Src\Vehicle\Components\Door;
use App\Src\Vehicle\Components\Engine;
use App\Src\Vehicle\Components\Wheel;

class CarBuilder implements Builder
{
    private Car $car;

    public function createVehicle(): void
    {
        $this->car = new Car();
    }

    public function addWheel(): void
    {
        $this->car->setPart('wheel', new Wheel());
    }

    public function addEngine(): void
    {
        $this->car->setPart('engine', new Engine());
    }

    public function addDoors(): void
    {
        $this->car->setPart('door', new Door());
    }

    public function getVehicle(): Vehicle
    {
        return $this->car;
    }

}
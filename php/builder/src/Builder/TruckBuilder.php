<?php
declare(strict_types=1);

namespace App\src\Builder;

use App\Src\Vehicle\Components\Door;
use App\Src\Vehicle\Components\Engine;
use App\Src\Vehicle\Components\Wheel;
use App\Src\Vehicle\Type\Truck;
use App\src\Vehicle\Type\Vehicle;

class TruckBuilder implements Builder
{
    private Truck $truck;

    public function createVehicle(): void
    {
        $this->truck = new Truck();
    }

    public function addWheel(): void
    {
        $this->truck->setPart('wheel', new Wheel());
    }

    public function addEngine(): void
    {
        $this->truck->setPart('engine', new Engine());
    }

    public function addDoors(): void
    {
        $this->truck->setPart('door', new Door());
    }

    public function getVehicle(): Vehicle
    {
        return $this->truck;
    }

}
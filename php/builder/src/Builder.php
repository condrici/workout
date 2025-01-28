<?php
declare(strict_types=1);

namespace App\Src;

use App\src\Vehicle\Type\Vehicle;

interface Builder
{
    public function createVehicle(): void;
    public function addWheel(): void;
    public function addEngine(): void;
    public function addDoors(): void;
    public function getVehicle(): Vehicle;
}
<?php

namespace App\Calculation\Domain\Model;

use App\Calculation\Domain\Model\VehicleTypeModelInterface;

class VehicleTypeModel implements VehicleTypeModelInterface
{
    public function __construct(
        private array $vehicleTypeArray,
    )
    {
    }

    public function getVehicleTypeArray() :array
    {
        return $this->vehicleTypeArray;
    }
}
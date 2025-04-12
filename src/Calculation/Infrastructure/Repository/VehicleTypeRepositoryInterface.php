<?php

namespace App\Calculation\Infrastructure\Repository;

use App\Calculation\Infrastructure\Entity\VehicleType;

interface VehicleTypeRepositoryInterface
{
    public function findById($vehicleTypeId): VehicleType;
}
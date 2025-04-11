<?php

namespace App\Calculation\Infrastructure\Repository;

use App\Calculation\Infrastructure\Entity\Rules;

interface RuleRepositoryInterface
{
    public function findOneByVehicleTypeIdAndName(int $vehicleTypeId, string $name): Rules;

    public function findOneByName(string $name): Rules;
}
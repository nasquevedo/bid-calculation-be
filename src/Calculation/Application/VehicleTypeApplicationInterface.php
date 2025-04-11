<?php

namespace App\Calculation\Application;

use App\Calculation\Domain\Model\VehicleTypeModel;

interface VehicleTypeApplicationInterface 
{
    public function getVehicleTypes(): VehicleTypeModel;
}
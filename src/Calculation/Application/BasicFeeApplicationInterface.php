<?php

namespace App\Calculation\Application;

use App\Calculation\Domain\Model\FeeModel;

interface BasicFeeApplicationInterface
{
    public function getBasicFee(int $vehicleBasePrice, int $vehicleTypeId): FeeModel;
}
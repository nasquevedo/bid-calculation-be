<?php 

namespace App\Calculation\Application;

use App\Calculation\Domain\Model\FeeModel;
use App\Calculation\Infrastructure\Entity\Rules;

interface SpecialFeeApplicationInterface
{
    public function getSpecialFee(int $vehicleBasePrice, int $vehicleTypeId): FeeModel;
}
<?php

namespace App\Calculation\Application;

use App\Calculation\Domain\Model\FeeModel;

interface StorageFeeApplicationInterface
{
    public function getStorageFee(): FeeModel;
}
<?php

namespace App\Calculation\Application;

use App\Calculation\Domain\Model\FeeModel;

interface AssociationFeeApplicationInterface
{
    public function getAssociationFee(float $price) :FeeModel;
}
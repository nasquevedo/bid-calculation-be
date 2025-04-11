<?php

namespace App\Calculation\Application;

use App\Calculation\Domain\Model\FeesModel;

interface FeesApplicationInterface
{
    public function getFees(
        array $basicFeeArray,
        array $specialFeeArray,
        array $associationFeeArray,
        array $storageFeeArray
    ): FeesModel;
}
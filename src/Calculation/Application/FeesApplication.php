<?php

namespace App\Calculation\Application;

use App\Calculation\Domain\Model\FeesModel;

class FeesApplication implements FeesApplicationInterface
{
    public function getFees(
        array $basicFeeArray,
        array $specialFeeArray,
        array $associationFeeArray,
        array $storageFeeArray
    ): FeesModel
    {
        return new FeesModel(
            $basicFeeArray,
            $specialFeeArray,
            $associationFeeArray,
            $storageFeeArray
        );
    }
}
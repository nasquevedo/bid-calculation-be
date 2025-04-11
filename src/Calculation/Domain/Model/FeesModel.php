<?php

namespace App\Calculation\Domain\Model;

class FeesModel 
{
    public function __construct(
        private Array $basicFee,
        private Array $specialFee,
        private Array $associationFee,
        private Array $storageFee
    )
    {}

    public function getArray(): array
    {
        return [
            $this->basicFee,
            $this->specialFee,
            $this->associationFee,
            $this->storageFee
        ];
    }
}
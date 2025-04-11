<?php

namespace App\Calculation\Domain\Model;

class PriceModel
{
    public function __construct(
        private int $vehiclePrice,
        private string $vehicleType,
        private array $fees,
        private float $totalFees,
        private float $total
    )  
    {}

    public function getArray()
    {
        return [
            'vehicle_base_price' => $this->vehiclePrice,
            'vehicle_type' => $this->vehicleType,
            'fees' => $this->fees,
            'total_fees' => $this->totalFees,
            'total' => $this->total
        ];
    }
}
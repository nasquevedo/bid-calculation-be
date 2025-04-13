<?php

namespace App\Calculation\Application\Service;

class CalculateService implements CalculateServiceInterface
{
    public function getValueByPercentage(float $vehicleBasePrice, int $percentage): float
    {
        return ($vehicleBasePrice * $percentage / 100);
    }

    public function getTotalFees(array $fees): float
    {
        
        $feesValues = array();
        foreach ($fees as $value) {
            $feesValues[$value['name']] = $value['value'];
        }
    
        return round(array_sum($feesValues), 2);
    }

    public function getTotal(float $vehicleBasePrice, float $totalFees): float
    {
        return ($vehicleBasePrice + $totalFees);
    }
}
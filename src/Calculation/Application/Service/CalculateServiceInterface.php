<?php

namespace App\Calculation\Application\Service;

interface CalculateServiceInterface
{
    public function getValueByPercentage(float $vehicleBasePrice, int $percentage): float;

    public function getTotalFees(array $fees): float;

    public function getTotal(float $vehicleBasePrice, float $totalFees): float;
}
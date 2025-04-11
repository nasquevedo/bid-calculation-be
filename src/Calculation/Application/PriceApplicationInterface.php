<?php

namespace App\Calculation\Application;

interface PriceApplicationInterface
{
    public function getPrice(int $vehicleBasePrice, int $vehicleTypeId) :array;
}
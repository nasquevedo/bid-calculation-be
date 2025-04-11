<?php

namespace App\Calculation\Application\Service;

interface RuleServiceInterface
{
    public function getRuleAttributes(?int $vehicleType, string $name): array;
}
<?php

namespace App\Calculation\Application\Service;

use App\Calculation\Infrastructure\Repository\RuleRepositoryInterface;

class RuleService implements RuleServiceInterface
{
    public function __construct(
        private RuleRepositoryInterface $ruleRepository
    )
    {}

    public function getRuleAttributes(?int $vehicleTypeId, string $name): array
    {
        if (null === $vehicleTypeId) {
            return $this->ruleRepository->findOneByName($name)->getAttributes();
        }

        return $this->ruleRepository->findOneByVehicleTypeIdAndName($vehicleTypeId, $name)->getAttributes();
    }
}
<?php

namespace App\Calculation\Application;

use App\Calculation\Application\BasicFeeApplicationInterface;
use App\Calculation\Application\Service\CalculateServiceInterface;
use App\Calculation\Application\Service\RuleServiceInterface;
use App\Calculation\Domain\Model\FeeModel;
use App\Calculation\enums\Rules as RuleEnums;

final class BasicFeeApplication implements BasicFeeApplicationInterface
{
    public function __construct(
        private RuleServiceInterface $ruleService,
        private CalculateServiceInterface $calculateService
    )
    {}

    public function getBasicFee(int $vehicleBasePrice, int $vehicleTypeId): FeeModel
    {
        $rule = $this->ruleService->getRuleAttributes($vehicleTypeId, RuleEnums::Basic->value);

        $percentageValue = $this->calculateService->getValueByPercentage($vehicleBasePrice, $rule['percentage']);

        $basicFee = match (true) {
            $rule['min'] >  $percentageValue => $rule['min'],
            $rule['max'] < $percentageValue => $rule['max'],
            default => $percentageValue
        };

        return new FeeModel(
            RuleEnums::Basic->value,
            $basicFee
        );
    }
}
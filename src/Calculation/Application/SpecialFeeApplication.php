<?php

namespace App\Calculation\Application;

use App\Calculation\Application\Service\CalculateService;
use App\Calculation\Application\Service\RuleServiceInterface;
use App\Calculation\Application\SpecialFeeApplicationInterface;
use App\Calculation\Domain\Model\FeeModel;
use App\Calculation\enums\Rules as RuleEnums;

final class SpecialFeeApplication implements SpecialFeeApplicationInterface
{
    const rules = [
        1 => ["percentage" => 2],
        2 => ["percentage" => 4]
    ];

    public function __construct(
        private RuleServiceInterface $ruleService,
        private CalculateService $calculateService
    )
    {}

    public function getSpecialFee(int $vehicleBaseprice, int $vehicleTypeId) :FeeModel
    {
        $rule = $this->ruleService->getRuleAttributes($vehicleTypeId, RuleEnums::Special->value);

        $specialFee = $this->calculateService->getValueByPercentage($vehicleBaseprice, $rule['percentage']);

        return new FeeModel(
            RuleEnums::Special->value,
            $specialFee
        );
    }
}
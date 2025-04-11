<?php

namespace App\Calculation\Application;

use App\Calculation\Application\Service\RuleServiceInterface;
use App\Calculation\Application\StorageFeeApplicationInterface;
use App\Calculation\enums\Rules as RuleEnums;
use App\Calculation\Domain\Model\FeeModel;

final class StorageFeeApplication implements StorageFeeApplicationInterface
{
    public function __construct(
        private RuleServiceInterface $ruleService
    )
    {}

    public function getStorageFee(): FeeModel
    {
        $rule = $this->ruleService->getRuleAttributes(null, RuleEnums::Storage->value);

        return new FeeModel(
            RuleEnums::Storage->value,
            $rule['value']
        );
    }
}
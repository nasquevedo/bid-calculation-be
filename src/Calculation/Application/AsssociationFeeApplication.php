<?php

namespace App\Calculation\Application;

use App\Calculation\Application\AssociationFeeApplicationInterface;
use App\Calculation\Application\Service\RuleServiceInterface;
use App\Calculation\Domain\Model\FeeModel;
use App\Calculation\enums\Rules as RuleEnums;

final class AsssociationFeeApplication implements AssociationFeeApplicationInterface
{
    public function __construct(
        private RuleServiceInterface $ruleService
    )
    {}

    public function getAssociationFee(float $vehicleBasePrice): FeeModel
    {
        $rules = $this->ruleService->getRuleAttributes(null, RuleEnums::Association->value);

        $associationFee = 0;
        foreach ($rules as $rule) {
            if (isset($rule['max'])) {
                if ($rule['min'] <= $vehicleBasePrice &&  $vehicleBasePrice < $rule['max']) {
                    $associationFee = $rule['value'];
                    break;
                }
            }

            $associationFee = $rule['value'];
        }

        return new FeeModel(
            RuleEnums::Association->value,
            $associationFee
        );
    }
}
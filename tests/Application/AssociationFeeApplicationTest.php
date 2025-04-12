<?php

namespace App\Tests\Application;

use App\Calculation\Application\AsssociationFeeApplication;
use App\Calculation\Application\Service\RuleServiceInterface;
use PHPUnit\Framework\TestCase;

class AssociationFeeApplicationTest extends TestCase
{
    public function testAssociationFee()
    {
        $ruleService = $this->createMock(RuleServiceInterface::class);

        $ruleService
            ->expects($this->once())
            ->method('getRuleAttributes')
            ->willReturn([
                ["max"=> 500, "min"=> 1, "value"=> 5], 
                ["max"=> 1000, "min"=> 500, "value"=> 10], 
                ["max"=> 3000, "min"=> 1000, "value"=> 15], 
                ["min"=> 3000, "value"=> 20]])
        ;

        $associtionFee = new AsssociationFeeApplication($ruleService);
        $basicFee = $associtionFee->getAssociationFee(398, 1);
        $equals = [
            "name" => 'Association',
            "value" => 5.0
        ];

        $this->assertEquals($equals, $basicFee->getArray());
    }
}
<?php

namespace App\Tests\Application;

use App\Calculation\Application\Service\RuleServiceInterface;
use App\Calculation\Application\StorageFeeApplication;
use PHPUnit\Framework\TestCase;

class StorageFeeApplicationTest extends TestCase
{
    public function testStorageFee()
    {
        $ruleService = $this->createMock(RuleServiceInterface::class);

        $ruleService
            ->expects($this->once())
            ->method('getRuleAttributes')
            ->willReturn(["value" => 100])
        ;

        $associtionFee = new StorageFeeApplication($ruleService);
        $basicFee = $associtionFee->getStorageFee(398, 1);
        $equals = [
            "name" => 'Storage',
            "value" => 100
        ];

        $this->assertEquals($equals, $basicFee->getArray());
    }
}
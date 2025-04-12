<?php

namespace App\Tests\Application;

use App\Calculation\Application\FeesApplication;
use PHPUnit\Framework\TestCase;

class FeesApplicationTest extends TestCase
{
    public function testFees()
    {
        $basicFeeArray = ["name" => "Basic", "value" => 39.80]; 
        $specialFeeArray = ["name" => "Special", "value" => 7.96]; 
        $associationFeeArray = ["name" => "Association", "value" => 5.0]; 
        $storageFeeArray = ["name" => "Storage", "value" => 100.0];

        $feesApp = new FeesApplication();

        $fees = $feesApp->getFees(
            $basicFeeArray, 
            $specialFeeArray, 
            $associationFeeArray,
            $storageFeeArray
        );

        $equals = [
            ["name" => "Basic", "value" => 39.80],
            ["name" => "Special", "value" => 7.96],
            ["name" => "Association", "value" => 5.0],
            ["name" => "Storage", "value" => 100.0]
        ];

        $this->assertEquals($equals, $fees->getArray());
    }
}
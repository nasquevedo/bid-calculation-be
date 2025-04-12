<?php

namespace App\Calculation\Application;

use App\Calculation\Application\AssociationFeeApplicationInterface;
use App\Calculation\Application\BasicFeeApplicationInterface;
use App\Calculation\Application\SpecialFeeApplicationInterface;
use App\Calculation\Application\StorageFeeApplicationInterface;
use App\Calculation\Application\FeesApplicationInterface;
use App\Calculation\Application\Service\CalculateServiceInterface;
use App\Calculation\Domain\Model\PriceModel;
use App\Calculation\Infrastructure\Repository\VehicleTypeRepositoryInterface;

final class PriceApplication implements PriceApplicationInterface
{
    public function __construct(
        private VehicleTypeRepositoryInterface $vehicleTypeRepository,
        private BasicFeeApplicationInterface $basicFee,
        private SpecialFeeApplicationInterface $specialFee,
        private AssociationFeeApplicationInterface $associationFee,
        private StorageFeeApplicationInterface $storageFee,
        private FeesApplicationInterface $fees,
        private CalculateServiceInterface $calculateService
    )
    {}

    public function getPrice(int $vehicleBasePrice, int $vehicleTypeId): array
    {
        $vehicleTypeName = $this->vehicleTypeRepository->findById($vehicleTypeId)->getName();

        $fees = $this->fees->getFees(
            $this->basicFee->getBasicFee($vehicleBasePrice, $vehicleTypeId)->getArray(),
            $this->specialFee->getSpecialFee($vehicleBasePrice, $vehicleTypeId)->getArray(),
            $this->associationFee->getAssociationFee($vehicleTypeId)->getArray(),
            $this->storageFee->getStorageFee()->getArray() 
        )->getArray();

        $totalFees = $this->calculateService->getTotalFees($fees);
        $total = $this->calculateService->getTotal($vehicleBasePrice, $totalFees);

        $price = new PriceModel(
            $vehicleBasePrice,
            $vehicleTypeName,
            $fees,
            $totalFees,
            $total
        );

        return $price->getArray();
    }
}
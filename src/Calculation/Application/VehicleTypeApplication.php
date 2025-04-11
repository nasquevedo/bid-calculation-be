<?php

namespace App\Calculation\Application;

use App\Calculation\Domain\Model\VehicleTypeModel;
use App\Calculation\Infrastructure\Repository\VehicleTypeRepositoryInterface;

final class VehicleTypeApplication implements VehicleTypeApplicationInterface
{
    public function __construct(
        private VehicleTypeRepositoryInterface $vehicleTypeRepository
    )
    {}

    public function getVehicleTypes(): VehicleTypeModel
    {
        $vehicleTypes = $this->vehicleTypeRepository->findAll();

        $data = [];
        foreach ($vehicleTypes as $vehicleType) {
            $data[] = [
                'id' => $vehicleType->getId(),
                'name' => $vehicleType->getName()
           ];
        }

        return new VehicleTypeModel(
            $data
        );
    }
}
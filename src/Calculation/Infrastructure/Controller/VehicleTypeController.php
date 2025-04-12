<?php

namespace App\Calculation\Infrastructure\Controller;

use App\Calculation\Application\Service\ResponseServiceInterface;
use App\Calculation\Application\VehicleTypeApplicationInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


#[Route('/api/v1')]
final class VehicleTypeController extends AbstractController
{

    public function __construct(
        private VehicleTypeApplicationInterface $vehicleTypeApplication,
        private ResponseServiceInterface $responseService
    ) {}

    #[Route('/vehicle/types', name: 'app_vehicle_types', methods: ['get'])]
    public function index(): JsonResponse
    {
        $vehicleTypes = $this->vehicleTypeApplication->getVehicleTypes()->getVehicleTypeArray();
        
        return $this->responseService->successResponse($vehicleTypes);
    }
}

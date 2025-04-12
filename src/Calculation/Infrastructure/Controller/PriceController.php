<?php

namespace App\Calculation\Infrastructure\Controller;

use App\Calculation\Application\PriceApplicationInterface;
use App\Calculation\Application\Service\ResponseServiceInterface;
use App\Calculation\Application\Service\ValidateRequestQueryServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('api/v1')]
final class PriceController extends AbstractController
{
    public function __construct(
        private PriceApplicationInterface $priceApplication,
        private ValidateRequestQueryServiceInterface $validateRequestQueryService,
        private ResponseServiceInterface $responseService
    )
    {}

    #[Route('/price', name: 'app_price', methods: ['get'])]
    public function price(Request $request): JsonResponse
    {
        $validateRequestQuery = $this->validateRequestQueryService->validateQueryFields($request->query->all());

        if (!$validateRequestQuery['isValid']) {
            return $this->responseService->badRequestResponse($validateRequestQuery['error']);
        }

        $vehicleBasePrice = $request->query->get('price');
        $vehicleTypeId = $request->query->get('type');
        $data = $this->priceApplication->getPrice((float)$vehicleBasePrice, (int)$vehicleTypeId);

        return $this->responseService->successResponse($data);
    }
}

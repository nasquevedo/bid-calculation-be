<?php

namespace App\Calculation\Infrastructure\Controller;

use App\Calculation\Application\PriceApplicationInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('api/v1')]
final class PriceController extends AbstractController
{
    public function __construct(
        private PriceApplicationInterface $priceApplication
    )
    {}

    #[Route('/price', name: 'app_price', methods: ['get'])]
    public function price(Request $request): JsonResponse
    {
        $vehicleBasePrice = $request->query->get('price');
        $vehicleTypeId = $request->query->get('type');
        $data = $this->priceApplication->getPrice((float)$vehicleBasePrice, (int)$vehicleTypeId);

        return $this->json([
            'data' => $data,
            'message' => 'success',
        ], Response::HTTP_OK);
    }
}

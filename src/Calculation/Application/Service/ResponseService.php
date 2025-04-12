<?php

namespace App\Calculation\Application\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ResponseService extends AbstractController implements ResponseServiceInterface
{
    public function successResponse($data): JsonResponse
    {
        return $this->json([
            'data' => $data,
            'message' => "Success",
        ], Response::HTTP_OK);
    }

    public function badRequestResponse($message): JsonResponse
    {
        return $this->json([
            "message" => $message
        ], Response::HTTP_BAD_REQUEST);
    }
}
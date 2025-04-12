<?php

namespace App\Calculation\Application\Service;
use Symfony\Component\HttpFoundation\JsonResponse;

interface ResponseServiceInterface 
{
    public function successResponse($data): JsonResponse;

    public function badRequestResponse($message): JsonResponse;
}
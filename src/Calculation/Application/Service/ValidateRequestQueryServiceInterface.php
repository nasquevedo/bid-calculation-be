<?php

namespace App\Calculation\Application\Service;

interface ValidateRequestQueryServiceInterface
{
    public function validateQueryFields(array $fields): array;
}
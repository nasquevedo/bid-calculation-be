<?php

namespace App\Calculation\Application\Service;

use App\Calculation\Application\Service\ValidateRequestQueryServiceInterface;

class ValidateRequestQueryService implements ValidateRequestQueryServiceInterface
{

    public function validateQueryFields(array $fields): array
    {
        $result = ["isValid" => true];

        if (count($fields) === 0) {
            $result = [
                'isValid' => false,
                 "error" => "A price and a type query parameters are expected, none found"
            ];

            return $result;
        }

        foreach ($fields as $key => $field) {
            if ('' === $field) {
                $result = [
                    "isValid" => false, 
                    "error" => "$key is required"
                ];
            }
        }

        return $result;
    }
}
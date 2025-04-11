<?php

namespace App\Calculation\Domain\Model;

use App\Calculation\Domain\Model\FeeModelInterface;

class FeeModel implements FeeModelInterface
{
    public function __construct(
        private string $name,
        private float $value
    )
    {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getArray(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value
        ];
    }
}
<?php

namespace App\Calculation\Domain\Model;

interface FeeModelInterface {
    public function getName(): string;

    public function getValue(): float;

    public function getArray(): array;
}
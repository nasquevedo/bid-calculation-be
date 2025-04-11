<?php

namespace App\Calculation\Infrastructure\Entity;

interface VehicleTypeInterface {
    public function getId(): ?int;

    public function setId(int $id): static;

    public function getName(): ?string;

    public function setName(string $name): static;

    public function getCreatedAt(): ?\DateTimeImmutable;

    public function setCreatedAt(\DateTimeImmutable $created_at): static;

    public function getUpdatedAt(): ?\DateTimeImmutable;

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): static;

    public function getDeletedAt(): ?\DateTimeImmutable;

    public function setDeletedAt(?\DateTimeImmutable $deleted_at): static;
}
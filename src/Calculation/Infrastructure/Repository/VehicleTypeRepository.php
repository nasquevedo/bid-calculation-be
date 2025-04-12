<?php

namespace App\Calculation\Infrastructure\Repository;

use App\Calculation\Infrastructure\Entity\VehicleType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VehicleTypes>
 */
class VehicleTypeRepository extends ServiceEntityRepository implements VehicleTypeRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehicleType::class);
    }

    public function findById($vehicleTypeId): VehicleType
    {
        return $this->createQueryBuilder('r')
            ->andWhere("r.id = :id")
            ->setParameter('id', $vehicleTypeId)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}

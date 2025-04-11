<?php

namespace App\Calculation\Infrastructure\Repository;

use App\Calculation\Infrastructure\Entity\Rules;
use App\Calculation\Infrastructure\Repository\RuleRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Rules>
 */
class RuleRepository extends ServiceEntityRepository implements RuleRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rules::class);
    }

    /**
    * @return Rules[] Returns an array of Rules objects
    */
    public function findOneByVehicleTypeIdAndName(int $vehicleTypeId, string $name): Rules
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.vehicleType = :id')
            ->andWhere("r.name = :name")
            ->setParameter('id', $vehicleTypeId)
            ->setParameter('name', $name)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findOneByName(string $name): Rules
    {
        return $this->createQueryBuilder('r')
            ->andWhere("r.name = :name")
            ->setParameter('name', $name)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}

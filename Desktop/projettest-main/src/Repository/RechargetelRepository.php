<?php

namespace App\Repository;

use App\Entity\Rechargetel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Rechargetel>
 *
 * @method Rechargetel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rechargetel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rechargetel[]    findAll()
 * @method Rechargetel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RechargetelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rechargetel::class);
    }

//    /**
//     * @return Rechargetel[] Returns an array of Rechargetel objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Rechargetel
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

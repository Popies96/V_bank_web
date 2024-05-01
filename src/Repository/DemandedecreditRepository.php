<?php

namespace App\Repository;

use App\Entity\Demandedecredit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Demandedecredit>
 *
 * @method Demandedecredit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Demandedecredit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Demandedecredit[]    findAll()
 * @method Demandedecredit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandedecreditRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Demandedecredit::class);
    }

//    /**
//     * @return Demandedecredit[] Returns an array of Demandedecredit objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Demandedecredit
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

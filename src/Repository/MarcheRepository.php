<?php

namespace App\Repository;

use App\Entity\Marche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Marche>
 *
 * @method Marche|null find($id, $lockMode = null, $lockVersion = null)
 * @method Marche|null findOneBy(array $criteria, array $orderBy = null)
 * @method Marche[]    findAll()
 * @method Marche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarcheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Marche::class);
    }
    public function getStocksCountByEntreprise(): array
    {
        $qb = $this->createQueryBuilder('m')
            ->select('e.nom AS entreprise_name', 'COUNT(s.id) AS stocks_count')
            ->join('m.stock', 's')
            ->join('s.entreprise', 'e')
            ->groupBy('e.nom');

        return $qb->getQuery()->getResult();
    }

//    /**
//     * @return Marche[] Returns an array of Marche objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Marche
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

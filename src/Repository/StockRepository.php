<?php

namespace App\Repository;

use App\Entity\Stock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

/**
 * @extends ServiceEntityRepository<Stock>
 *
 * @method Stock|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stock|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stock[]    findAll()
 * @method Stock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stock::class);
    }

//    /**
//     * @return Stock[] Returns an array of Stock objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Stock
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    public function findByEntreprise(int $entrepriseId): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.entreprise = :entrepriseId')
            ->setParameter('entrepriseId', $entrepriseId)
            ->getQuery()
            ->getResult();
    }

    public function QRcode($name, $price, $quantity)
    {
        $text = sprintf(
            "Stock Name: %s\nPrice: %s\nQuantity: %s",
            $name,
            $price,
            $quantity,

        );
        $qr_code = QrCode::create($text)
            ->setSize(130)
            ->setMargin(0)
            ->setForegroundColor(new Color(14, 233, 81))
            ->setBackgroundColor(new Color(236, 233, 230));

        $writer = new PngWriter;

        $result = $writer->write($qr_code);

        header("Content-Type: image/png");
        $imageData = base64_encode($result->getString());
        return 'data:image/png;base64,' . $imageData;
    }
}

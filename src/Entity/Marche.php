<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


use App\Repository\MarcheRepository;
#[ORM\Entity(repositoryClass : MarcheRepository::class)]
#[ORM\Table(name: "marche", indexes: [new ORM\Index(name: "fk_stock_marche", columns: ["stock_id"])])]

class Marche
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "id", type: "integer", nullable: false)]
    private ?int $id;

    #[ORM\Column(name: "user_id", type: "integer", nullable: false)]
    private int $userId;

    #[ORM\Column(name: "quantite", type: "integer", nullable: false)]
    private int $quantite;

    #[ORM\Column(name: "total", type: "decimal", precision: 10, scale: 0, nullable: false)]
    private string $total;

    #[ORM\Column(name: "date_achat", type: "datetime", nullable: false, options: ["default" => "CURRENT_TIMESTAMP"])]
    private \DateTimeInterface $dateAchat;

    #[ORM\ManyToOne(targetEntity: Stock::class)]
    #[ORM\JoinColumn(name: "stock_id", referencedColumnName: "id")]
    private ?Stock $stock;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): static
    {
        $this->userId = $userId;
        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;
        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): static
    {
        $this->total = $total;
        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTimeInterface $dateAchat): static
    {
        $this->dateAchat = $dateAchat;
        return $this;
    }

    public function getStock(): ?Stock
    {
        return $this->stock;
    }

    public function setStock(?Stock $stock): static
    {
        $this->stock = $stock;
        return $this;
    }
}

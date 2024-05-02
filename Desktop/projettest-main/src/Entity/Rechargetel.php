<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use App\Repository\RechargetelRepository;

#[Entity(repositoryClass: RechargetelRepository::class)]
#[Table(name: "rechargetel")]
class Rechargetel
{
    #[Id]
    #[Column(name: "id_Rech", type: "integer", nullable: false)]
    #[GeneratedValue(strategy: "IDENTITY")]
    private ?int $idRech;

    #[Column(name: "operateur", type: "string", length: 255, nullable: false)]
    private string $operateur;

    #[Column(name: "montant", type: "integer", nullable: false)]
    private int $montant;

    #[Column(name: "numTel", type: "integer", nullable: false)]
    private int $numtel;

    #[Column(name: "dateTemps", type: "string", length: 255, nullable: false)]
    private string $datetemps;

    public function getIdRech(): ?int
    {
        return $this->idRech;
    }

    public function getOperateur(): ?string
    {
        return $this->operateur;
    }

    public function setOperateur(string $operateur): static
    {
        $this->operateur = $operateur;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getNumtel(): ?int
    {
        return $this->numtel;
    }

    public function setNumtel(int $numtel): static
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getDatetemps(): ?string
    {
        return $this->datetemps;
    }

    public function setDatetemps(string $datetemps): static
    {
        $this->datetemps = $datetemps;

        return $this;
    }
}

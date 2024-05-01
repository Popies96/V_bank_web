<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rechargetel
 *
 * @ORM\Table(name="rechargetel")
 * @ORM\Entity
 */
class Rechargetel
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_Rech", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRech;

    /**
     * @var string
     *
     * @ORM\Column(name="operateur", type="string", length=255, nullable=false)
     */
    private $operateur;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer", nullable=false)
     */
    private $montant;

    /**
     * @var int
     *
     * @ORM\Column(name="numTel", type="integer", nullable=false)
     */
    private $numtel;

    /**
     * @var string
     *
     * @ORM\Column(name="dateTemps", type="string", length=255, nullable=false)
     */
    private $datetemps;

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

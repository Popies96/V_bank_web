<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cheque
 *
 * @ORM\Table(name="cheque", indexes={@ORM\Index(name="numéro_compte", columns={"numerocompte"})})
 * @ORM\Entity
 */
class Cheque
{
    /**
     * @var int
     *
     * @ORM\Column(name="numero_de_cheque", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numeroDeCheque;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montant", type="float", precision=10, scale=3, nullable=true)
     */
    private $montant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="beneficiaire", type="string", length=255, nullable=true)
     */
    private $beneficiaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_emission", type="string", length=255, nullable=true)
     */
    private $dateEmission;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emetteur", type="string", length=255, nullable=true)
     */
    private $emetteur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="statut", type="string", length=100, nullable=true)
     */
    private $statut;

    /**
     * @var \Demandecheque
     *
     * @ORM\ManyToOne(targetEntity="Demandecheque")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numerocompte", referencedColumnName="numerocompte")
     * })
     */
    private $numerocompte;

    public function getNumeroDeCheque(): ?int
    {
        return $this->numeroDeCheque;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getBeneficiaire(): ?string
    {
        return $this->beneficiaire;
    }

    public function setBeneficiaire(?string $beneficiaire): static
    {
        $this->beneficiaire = $beneficiaire;

        return $this;
    }

    public function getDateEmission(): ?string
    {
        return $this->dateEmission;
    }

    public function setDateEmission(?string $dateEmission): static
    {
        $this->dateEmission = $dateEmission;

        return $this;
    }

    public function getEmetteur(): ?string
    {
        return $this->emetteur;
    }

    public function setEmetteur(?string $emetteur): static
    {
        $this->emetteur = $emetteur;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getNumerocompte(): ?Demandecheque
    {
        return $this->numerocompte;
    }

    public function setNumerocompte(?Demandecheque $numerocompte): static
    {
        $this->numerocompte = $numerocompte;

        return $this;
    }


}

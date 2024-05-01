<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demandecheque
 *
 * @ORM\Table(name="demandecheque")
 * @ORM\Entity
 */
class Demandecheque
{
    /**
     * @var string
     *
     * @ORM\Column(name="numerocompte", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numerocompte;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montant_demandé", type="float", precision=10, scale=3, nullable=true)
     */
    private $montantDemandé;

    /**
     * @var string|null
     *
     * @ORM\Column(name="raison", type="string", length=255, nullable=true)
     */
    private $raison;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_demande", type="string", length=255, nullable=true)
     */
    private $dateDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=255, nullable=false)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="num_telephone", type="string", length=255, nullable=false)
     */
    private $numTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="type_cheque", type="string", length=255, nullable=false)
     */
    private $typeCheque;

    /**
     * @var string
     *
     * @ORM\Column(name="statut_demande", type="string", length=255, nullable=false)
     */
    private $statutDemande;

    public function getNumerocompte(): ?string
    {
        return $this->numerocompte;
    }

    public function getMontantDemandé(): ?float
    {
        return $this->montantDemandé;
    }

    public function setMontantDemandé(?float $montantDemandé): static
    {
        $this->montantDemandé = $montantDemandé;

        return $this;
    }

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function setRaison(?string $raison): static
    {
        $this->raison = $raison;

        return $this;
    }

    public function getDateDemande(): ?string
    {
        return $this->dateDemande;
    }

    public function setDateDemande(?string $dateDemande): static
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): static
    {
        $this->cin = $cin;

        return $this;
    }

    public function getNumTelephone(): ?string
    {
        return $this->numTelephone;
    }

    public function setNumTelephone(string $numTelephone): static
    {
        $this->numTelephone = $numTelephone;

        return $this;
    }

    public function getTypeCheque(): ?string
    {
        return $this->typeCheque;
    }

    public function setTypeCheque(string $typeCheque): static
    {
        $this->typeCheque = $typeCheque;

        return $this;
    }

    public function getStatutDemande(): ?string
    {
        return $this->statutDemande;
    }

    public function setStatutDemande(string $statutDemande): static
    {
        $this->statutDemande = $statutDemande;

        return $this;
    }


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demandedecarte
 *
 * @ORM\Table(name="demandedecarte", indexes={@ORM\Index(name="fk_demandedecarte_user", columns={"iduser"})})
 * @ORM\Entity
 */
class Demandedecarte
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcartdemande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcartdemande;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typecarte", type="string", length=255, nullable=true)
     */
    private $typecarte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reseaucarte", type="string", length=255, nullable=true)
     */
    private $reseaucarte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modapaiement", type="string", length=255, nullable=true)
     */
    private $modapaiement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="docjustificatifs", type="string", length=255, nullable=true)
     */
    private $docjustificatifs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dateDemande", type="string", length=255, nullable=true)
     */
    private $datedemande;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comdebanque", type="string", length=255, nullable=true)
     */
    private $comdebanque;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dateemission", type="string", length=255, nullable=true)
     */
    private $dateemission;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cordodemandeur", type="string", length=255, nullable=true)
     */
    private $cordodemandeur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="statutdemande", type="string", length=255, nullable=true)
     */
    private $statutdemande;

    /**
     * @var int
     *
     * @ORM\Column(name="iduser", type="integer", nullable=false)
     */
    private $iduser;

    public function getIdcartdemande(): ?int
    {
        return $this->idcartdemande;
    }

    public function getTypecarte(): ?string
    {
        return $this->typecarte;
    }

    public function setTypecarte(?string $typecarte): static
    {
        $this->typecarte = $typecarte;

        return $this;
    }

    public function getReseaucarte(): ?string
    {
        return $this->reseaucarte;
    }

    public function setReseaucarte(?string $reseaucarte): static
    {
        $this->reseaucarte = $reseaucarte;

        return $this;
    }

    public function getModapaiement(): ?string
    {
        return $this->modapaiement;
    }

    public function setModapaiement(?string $modapaiement): static
    {
        $this->modapaiement = $modapaiement;

        return $this;
    }

    public function getDocjustificatifs(): ?string
    {
        return $this->docjustificatifs;
    }

    public function setDocjustificatifs(?string $docjustificatifs): static
    {
        $this->docjustificatifs = $docjustificatifs;

        return $this;
    }

    public function getDatedemande(): ?string
    {
        return $this->datedemande;
    }

    public function setDatedemande(?string $datedemande): static
    {
        $this->datedemande = $datedemande;

        return $this;
    }

    public function getComdebanque(): ?string
    {
        return $this->comdebanque;
    }

    public function setComdebanque(?string $comdebanque): static
    {
        $this->comdebanque = $comdebanque;

        return $this;
    }

    public function getDateemission(): ?string
    {
        return $this->dateemission;
    }

    public function setDateemission(?string $dateemission): static
    {
        $this->dateemission = $dateemission;

        return $this;
    }

    public function getCordodemandeur(): ?string
    {
        return $this->cordodemandeur;
    }

    public function setCordodemandeur(?string $cordodemandeur): static
    {
        $this->cordodemandeur = $cordodemandeur;

        return $this;
    }

    public function getStatutdemande(): ?string
    {
        return $this->statutdemande;
    }

    public function setStatutdemande(?string $statutdemande): static
    {
        $this->statutdemande = $statutdemande;

        return $this;
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function setIduser(int $iduser): static
    {
        $this->iduser = $iduser;

        return $this;
    }


}

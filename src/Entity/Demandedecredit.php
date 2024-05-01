<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Demandedecredit
 *
 * @ORM\Table(name="demandedecredit")
 * @ORM\Entity
 */
class Demandedecredit
{
    /**
     * @var int
     *
     * @ORM\Column(name="cin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var int|null
     *
     * @ORM\Column(name="phone", type="integer", nullable=true)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typedecredit", type="string", length=255, nullable=true)
     */
    private $typedecredit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="etatcivil", type="string", length=255, nullable=true)
     */
    private $etatcivil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bulletin", type="text", length=65535, nullable=true)
     */
    private $bulletin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sommedecredit", type="integer", nullable=true)
     */
    private $sommedecredit;

    /**
     * @var int|null
     *
     * @ORM\Column(name="echeance", type="integer", nullable=true)
     */
    private $echeance;

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getTypedecredit(): ?string
    {
        return $this->typedecredit;
    }

    public function setTypedecredit(?string $typedecredit): static
    {
        $this->typedecredit = $typedecredit;

        return $this;
    }

    public function getEtatcivil(): ?string
    {
        return $this->etatcivil;
    }

    public function setEtatcivil(?string $etatcivil): static
    {
        $this->etatcivil = $etatcivil;

        return $this;
    }

    public function getBulletin(): ?string
    {
        return $this->bulletin;
    }

    public function setBulletin(?string $bulletin): static
    {
        $this->bulletin = $bulletin;

        return $this;
    }

    public function getSommedecredit(): ?int
    {
        return $this->sommedecredit;
    }

    public function setSommedecredit(?int $sommedecredit): static
    {
        $this->sommedecredit = $sommedecredit;

        return $this;
    }

    public function getEcheance(): ?int
    {
        return $this->echeance;
    }

    public function setEcheance(?int $echeance): static
    {
        $this->echeance = $echeance;

        return $this;
    }


}

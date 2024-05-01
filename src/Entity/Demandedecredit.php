<?php

namespace App\Entity;

use App\Repository\DemandedecreditRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: "demandedecredit")]
#[ORM\Entity(repositoryClass: DemandedecreditRepository::class)]
class Demandedecredit
{
    #[ORM\Id]
    #[ORM\Column(name: "cin", type: "integer", nullable: false)]
    private ?int $cin;

    #[ORM\Column(name: "nom", type: "string", length: 255, nullable: true)]
    private ?string $nom;

    #[ORM\Column(name: "prenom", type: "string", length: 255, nullable: true)]
    private ?string $prenom;

    #[ORM\Column(name: "phone", type: "integer", nullable: true)]
    private ?int $phone;

    #[ORM\Column(name: "typedecredit", type: "string", length: 255, nullable: true)]
    private ?string $typedecredit;

    #[ORM\Column(name: "etatcivil", type: "string", length: 255, nullable: true)]
    private ?string $etatcivil;

    #[ORM\Column(name: "bulletin", type: "text", length: 65535, nullable: true)]
    private ?string $bulletin;

    #[ORM\Column(name: "sommedecredit", type: "integer", nullable: true)]
    private ?int $sommedecredit;

    #[ORM\Column(name: "echeance", type: "integer", nullable: true)]
    private ?int $echeance;

    public function getCin(): ?int
    {
        return $this->cin;
    }
    public function setCin(int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function getTypedecredit(): ?string
    {
        return $this->typedecredit;
    }

    public function setTypedecredit(?string $typedecredit): self
    {
        $this->typedecredit = $typedecredit;
        return $this;
    }

    public function getEtatcivil(): ?string
    {
        return $this->etatcivil;
    }

    public function setEtatcivil(?string $etatcivil): self
    {
        $this->etatcivil = $etatcivil;
        return $this;
    }

    public function getBulletin(): ?string
    {
        return $this->bulletin;
    }

    public function setBulletin(?string $bulletin): self
    {
        $this->bulletin = $bulletin;
        return $this;
    }

    public function getSommedecredit(): ?int
    {
        return $this->sommedecredit;
    }

    public function setSommedecredit(?int $sommedecredit): self
    {
        $this->sommedecredit = $sommedecredit;
        return $this;
    }

    public function getEcheance(): ?int
    {
        return $this->echeance;
    }

    public function setEcheance(?int $echeance): self
    {
        $this->echeance = $echeance;
        return $this;
    }
}

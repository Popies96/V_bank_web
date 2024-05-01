<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: "cartebancaire", indexes: [new Index(name: "fk_user_id", columns: ["iduser"]), new Index(name: "fk_decarte_user", columns: ["idcartdemande"])])]
class Cartebancaire
{
    #[Id]
    #[GeneratedValue(strategy: "IDENTITY")]
    #[Column(name: "idcartbank", type: "integer", nullable: false)]
    private ?int $idcartbank;

    #[Column(name: "typecarte", type: "string", length: 255, nullable: true)]
    private ?string $typecarte;

    #[Column(name: "reseaucarte", type: "string", length: 255, nullable: true)]
    private ?string $reseaucarte;

    #[Column(name: "numcarte", type: "integer", nullable: true)]
    private ?int $numcarte;

    #[Column(name: "dateexpiration", type: "string", length: 255, nullable: true)]
    private ?string $dateexpiration;

    #[Column(name: "nomtitulaire", type: "string", length: 255, nullable: true)]
    private ?string $nomtitulaire;

    #[Column(name: "codesecurite", type: "integer", nullable: true)]
    private ?int $codesecurite;

    #[Column(name: "historiquetransaction", type: "string", length: 255, nullable: true)]
    private ?string $historiquetransaction;

    #[Column(name: "statutcarte", type: "string", length: 255, nullable: true)]
    private ?string $statutcarte;

    #[Column(name: "iduser", type: "integer", nullable: true)]
    private ?int $iduser;

    #[Column(name: "idcartdemande", type: "integer", nullable: false)]
    private int $idcartdemande;

    public function getIdcartbank(): ?int
    {
        return $this->idcartbank;
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

    public function getNumcarte(): ?int
    {
        return $this->numcarte;
    }

    public function setNumcarte(?int $numcarte): static
    {
        $this->numcarte = $numcarte;

        return $this;
    }

    public function getDateexpiration(): ?string
    {
        return $this->dateexpiration;
    }

    public function setDateexpiration(?string $dateexpiration): static
    {
        $this->dateexpiration = $dateexpiration;

        return $this;
    }

    public function getNomtitulaire(): ?string
    {
        return $this->nomtitulaire;
    }

    public function setNomtitulaire(?string $nomtitulaire): static
    {
        $this->nomtitulaire = $nomtitulaire;

        return $this;
    }

    public function getCodesecurite(): ?int
    {
        return $this->codesecurite;
    }

    public function setCodesecurite(?int $codesecurite): static
    {
        $this->codesecurite = $codesecurite;

        return $this;
    }

    public function getHistoriquetransaction(): ?string
    {
        return $this->historiquetransaction;
    }

    public function setHistoriquetransaction(?string $historiquetransaction): static
    {
        $this->historiquetransaction = $historiquetransaction;

        return $this;
    }

    public function getStatutcarte(): ?string
    {
        return $this->statutcarte;
    }

    public function setStatutcarte(?string $statutcarte): static
    {
        $this->statutcarte = $statutcarte;

        return $this;
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function setIduser(?int $iduser): static
    {
        $this->iduser = $iduser;

        return $this;
    }

    public function getIdcartdemande(): ?int
    {
        return $this->idcartdemande;
    }

    public function setIdcartdemande(int $idcartdemande): static
    {
        $this->idcartdemande = $idcartdemande;

        return $this;
    }
}

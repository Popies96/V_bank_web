<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use App\Repository\TransactionRepository;

#[Entity(repositoryClass: TransactionRepository::class)]
#[Table(name: "transaction")]
class Transaction
{
    #[Id]
    #[Column(name: "id_Trans", type: "integer", nullable: false)]
    #[GeneratedValue(strategy: "IDENTITY")]
    private int $idTrans;

    #[Column(name: "expediteur", type: "string", length: 255, nullable: false)]
    private string $expediteur;

    #[Column(name: "destinataire", type: "string", length: 255, nullable: false)]
    private string $destinataire;

    #[Column(name: "montant", type: "integer", nullable: false)]
    private int $montant;

    #[Column(name: "type", type: "string", length: 255, nullable: false)]
    private string $type;

    #[Column(name: "dateTemps", type: "string", length: 255, nullable: false)]
    private string $datetemps;

    #[Column(name: "localisation", type: "string", length: 255, nullable: false)]
    private string $localisation;

    #[Column(name: "etat", type: "string", length: 255, nullable: false)]
    private string $etat;

    #[Column(name: "description", type: "string", length: 255, nullable: true)]
    private ?string $description = null;

    public function getIdTrans(): ?int
    {
        return $this->idTrans;
    }

    public function getExpediteur(): ?string
    {
        return $this->expediteur;
    }

    public function setExpediteur(string $expediteur): static
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    public function getDestinataire(): ?string
    {
        return $this->destinataire;
    }

    public function setDestinataire(string $destinataire): static
    {
        $this->destinataire = $destinataire;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): static
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}

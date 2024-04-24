<?php

namespace App\Entity;

use App\Repository\ChequeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ChequeRepository::class)]
class Cheque
{

    #[Assert\Regex(
        pattern: '/^\d{12}$/',
        message: "Le numero de chèque comporte exactement 12 chiffres."
    )]
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    private int $numero_de_cheque;

    #[Assert\Regex(
        pattern: "/^[0-9]+$/",
        message: "le montant ne doit contenir que des chiffres."
    )]
    #[ORM\Column(type: 'float', scale: 3)]

    private float $montant;

    #[ORM\Column(type: 'string', length: 255)]
    private string $beneficiaire;


    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $date_emission;

    #[ORM\Column(type: 'string', length: 255)]
    private string $emetteur;

    public function getDateEmission(): \DateTimeInterface
    {
        return $this->date_emission;
    }

    public function setDateEmission(\DateTimeInterface $date_emission): void
    {
        $this->date_emission = $date_emission;
    }

    #[ORM\Column(type: "string", length: 255)]
    private string $statut;

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }

    #[ORM\ManyToOne(targetEntity: Demandecheque::class, inversedBy: "Cheque")]
    #[ORM\JoinColumn(name: "numerocompte", referencedColumnName: "numerocompte")]
    private Demandecheque $numerocompte;

    public function getNumero_de_cheque(): int
    {
        return $this->numero_de_cheque;
    }
    public function setNumero_De_Cheque(int $numero_de_cheque): void
    {
        $this->numero_de_cheque = $numero_de_cheque;
    }

    public function getNumeroDeCheque(): int
    {
        return $this->numero_de_cheque;
    }

    public function setNumeroDeCheque(int $numero_de_cheque): void
    {
        $this->numero_de_cheque = $numero_de_cheque;
    }

    public function getMontant(): float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): void
    {
        $this->montant = $montant;
    }

    public function getBeneficiaire(): string
    {
        return $this->beneficiaire;
    }

    public function setBeneficiaire(string $beneficiaire): void
    {
        $this->beneficiaire = $beneficiaire;
    }



    public function getEmetteur(): string
    {
        return $this->emetteur;
    }

    public function setEmetteur(string $emetteur): void
    {
        $this->emetteur = $emetteur;
    }



    public function getNumerocompte(): DemandeCheque
    {
        return $this->numerocompte;
    }

    public function setNumerocompte(DemandeCheque $numerocompte): void
    {
        $this->numerocompte = $numerocompte;
    }

}

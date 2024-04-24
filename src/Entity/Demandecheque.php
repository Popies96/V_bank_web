<?php

namespace App\Entity;

use App\Repository\DemandechequeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: DemandechequeRepository::class)]
class Demandecheque
{


    #[Assert\Regex(
        pattern: '/^\d{12}$/',
        message: "Le numero de compte comporte exactement 12 chiffres."
    )]

    #[ORM\Id]
    #[ORM\OneToMany(targetEntity: Cheque::class, mappedBy: "Demandecheque", cascade: ["remove"])]
    #[ORM\Column(type: 'string', length: 20)]
    private string $numerocompte;

    #[Assert\Regex(
        pattern: "/^[0-9]+$/",
        message: "le montant ne doit contenir que des chiffres."
    )]
    #[ORM\Column(type: 'float', scale: 3)]
    private float $montant_demande;

    #[ORM\Column(type: 'string', length: 255)]
    private string $raison;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $date_demande;

    public function getDateDemande(): \DateTimeInterface
    {
        return $this->date_demande;
    }

    #[Assert\Regex(
        pattern: '/^\d{8}$/',
        message: "-Le numero carte d'identité comporte 8 chiffres."
    )]
    #[ORM\Column(type: 'string', length: 255)]
    private string $cin;


    #[Assert\Regex(
        pattern: '/^\d{8}$/',
        message: "-Veuillez saisir un numero de téléphone valide ."
    )]
    #[ORM\Column(type: 'string', length: 255)]
    private string $num_telephone;

    #[ORM\Column(type: 'string', length: 255)]
    private string $type_cheque;

    #[ORM\Column(type: 'string', length: 255)]
    private string $statut_demande;

    public function getNumerocompte(): string
    {
        return $this->numerocompte;
    }

    public function setNumerocompte(string $numerocompte): void
    {
        $this->numerocompte = $numerocompte;
    }

    public function getMontantDemande(): float
    {
        return $this->montant_demande;
    }

    public function setMontantDemande(float $montant_demande): void
    {
        $this->montant_demande = $montant_demande;
    }

    public function getRaison(): string
    {
        return $this->raison;
    }

    public function setRaison(string $raison): void
    {
        $this->raison = $raison;
    }



    public function setDateDemande(string $date_demande): self
    {
        $this->date_demande = new \DateTime($date_demande); // Convertir la chaîne en objet DateTime
        return $this;
    }

    public function getCin(): string
    {
        return $this->cin;
    }

    public function setCin(string $cin): void
    {
        $this->cin = $cin;
    }

    public function getNumTelephone(): string
    {
        return $this->num_telephone;
    }

    public function setNumTelephone(string $num_telephone): void
    {
        $this->num_telephone = $num_telephone;
    }

    public function getTypeCheque(): string
    {
        return $this->type_cheque;
    }

    public function setTypeCheque(string $type_cheque): void
    {
        $this->type_cheque = $type_cheque;
    }

    public function getStatutDemande(): string
    {
        return $this->statut_demande;
    }

    public function setStatutDemande(string $statut_demande): void
    {
        $this->statut_demande = $statut_demande;
    }

}

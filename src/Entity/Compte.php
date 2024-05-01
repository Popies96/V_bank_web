<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompteRepository;



#[ORM\Table(name: "compte", indexes: [new ORM\Index(columns: ["id_user"], name: "fk_id_user")])]
#[ORM\Entity(repositoryClass: CompteRepository::class)]
class Compte {
    #[ORM\Column(name: "id_compte", type: "integer", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    private int $idCompte;

    #[ORM\Column(name: "solde", type: "integer", nullable: false)]
    private int $solde;

    #[ORM\Column(name: "date_de_creation", type: "date", nullable: false)]
    private \DateTimeInterface $dateDeCreation;

    #[ORM\Column(name: "type_compte", type: "string", length: 50, nullable: false)]
    private string $typeCompte;

    #[ORM\Column(name: "etat", type: "string", length: 50, nullable: false, options: ["default" => "activé"])]
    private string $etat = 'activé';

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "id_user", referencedColumnName: "id_user")]
    private ?User $idUser;

    public function getIdCompte(): ?int
    {
        return $this->idCompte;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(int $solde): static
    {
        $this->solde = $solde;

        return $this;
    }

    public function getDateDeCreation(): ?\DateTimeInterface
    {
        return $this->dateDeCreation;
    }

    public function setDateDeCreation(\DateTimeInterface $dateDeCreation): static
    {
        $this->dateDeCreation = $dateDeCreation;

        return $this;
    }

    public function getTypeCompte(): ?string
    {
        return $this->typeCompte;
    }

    public function setTypeCompte(string $typeCompte): static
    {
        $this->typeCompte = $typeCompte;

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

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }


}

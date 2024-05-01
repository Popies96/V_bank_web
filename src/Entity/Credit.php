<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CreditRepository;
use Doctrine\DBAL\Types\Types;

#[ORM\Table(name: "credit", indexes: [new ORM\Index(columns: ["id_demande"], name: "test")])]
#[ORM\Entity(repositoryClass: CreditRepository::class)]
class Credit
{
    #[ORM\Column(name: "status", type: "string", length: 255, nullable: true)]
    private ?string $status;

    #[ORM\Column(name: "montant", type: "integer", nullable: true)]
    private ?int $montant;

    #[ORM\Column(name: "date", type: "date", nullable: true)]
    private ?\DateTimeInterface $date;

    #[ORM\Column(name: "historique", type: "text", length: 65535, nullable: true)]
    private ?string $historique;

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "NONE")]
    #[ORM\OneToOne(targetEntity: Demandedecredit::class)]
    #[ORM\JoinColumn(name: "id_demande", referencedColumnName: "cin")]
    private ?Demandedecredit $idDemande;

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(?int $montant): self
    {
        $this->montant = $montant;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getHistorique(): ?string
    {
        return $this->historique;
    }

    public function setHistorique(?string $historique): self
    {
        $this->historique = $historique;
        return $this;
    }

    public function getIdDemande(): ?Demandedecredit
    {
        return $this->idDemande;
    }

    public function setIdDemande(?Demandedecredit $idDemande): self
    {
        $this->idDemande = $idDemande;
        return $this;
    }
}

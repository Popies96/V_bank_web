<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\Index;
use App\Repository\ReclamationRepository;

#[Entity(repositoryClass: ReclamationRepository::class)]
#[Table(name: "reclamation" ,indexes: [new Index(columns: ["id_trans"], name: "FK_Reclamation_Transaction")])]

class Reclamation
{
    #[Id]
    #[GeneratedValue(strategy: "IDENTITY")]
    #[Column(name: "id_Reclam", type: "integer", nullable: false)]
    private ?int $idReclam;

    #[Column(name: "Date", type: "string", length: 255, nullable: false)]
    private string $date;

    #[Column(name: "Description", type: "string", length: 255, nullable: false)]
    private string $description;

    #[Column(name: "Status", type: "string", length: 255, nullable: false)]
    private string $status;

    #[Column(name: "Category", type: "string", length: 255, nullable: false)]
    private string $category;

    #[ManyToOne(targetEntity: Transaction::class)]
    #[JoinColumn(name: "id_trans", referencedColumnName: "id_Trans")]
    private Transaction $idTrans;

    public function getIdReclam(): ?int
    {
        return $this->idReclam;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;
        return $this;
    }

    public function getIdTrans(): Transaction
    {
        return $this->idTrans;
    }

    public function setIdTrans(Transaction $idTrans): static
    {
        $this->idTrans = $idTrans;
        return $this;
    }
}

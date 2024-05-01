<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use App\Repository\EntrepriseRepository;
#[ORM\Entity(repositoryClass : EntrepriseRepository::class)]
#[ORM\Table(name: "entreprise")]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "id", type: "integer", nullable: false)]
    private ?int $id;

    #[ORM\Column(name: "nom", type: "string", length: 255, nullable: false)]
    private string $nom;

    #[ORM\Column(name: "industrie", type: "string", length: 255, nullable: false)]
    private string $industrie;

    #[ORM\Column(name: "type", type: "string", length: 100, nullable: false)]
    private string $type;

    #[ORM\Column(name: "solde", type: "decimal", precision: 10, scale: 0, nullable: true)]
    private ?string $solde;

    #[ORM\Column(name: "adresse", type: "string", length: 100, nullable: false)]
    private string $adresse;

    #[ORM\Column(name: "tel", type: "string", length: 10, nullable: false)]
    private string $tel;

    #[ORM\Column(name: "pays", type: "string", length: 255, nullable: false)]
    private string $pays;

    #[ORM\Column(name: "adresse_mail", type: "string", length: 30, nullable: false)]
    private string $adresseMail;

    #[ORM\Column(name: "mot_de_passe", type: "string", length: 100, nullable: false)]
    private string $motDePasse;

    #[ORM\OneToMany(mappedBy: "entreprise", targetEntity: Stock::class)]
    private Collection $stocks;

    public function __construct()
    {
        $this->stocks = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }


    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getIndustrie(): ?string
    {
        return $this->industrie;
    }

    public function setIndustrie(string $industrie): static
    {
        $this->industrie = $industrie;
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

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(?string $solde): static
    {
        $this->solde = $solde;
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;
        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;
        return $this;
    }

    public function getAdresseMail(): ?string
    {
        return $this->adresseMail;
    }

    public function setAdresseMail(string $adresseMail): static
    {
        $this->adresseMail = $adresseMail;
        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): static
    {
        $this->motDePasse = $motDePasse;
        return $this;
    }
    /**
     * @return Collection<int, Stock>
     */
    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    public function addStock(Stock $stock): self
    {
        if (!$this->stocks->contains($stock)) {
            $this->stocks[] = $stock;
            $stock->setEntreprise($this);
        }

        return $this;
    }

    public function removeStock(Stock $stock): self
    {
        if ($this->stocks->removeElement($stock)) {
            // set the owning side to null (unless already changed)
            if ($stock->getEntreprise() === $this) {
                $stock->setEntreprise(null);
            }
        }

        return $this;
    }
}

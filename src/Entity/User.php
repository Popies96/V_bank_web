<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Table(name: "user")]
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Column(name: "id_user", type: "integer", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private ?int $idUser;

    #[ORM\Column(name: "nom", type: "string", length: 50, nullable: false)]
    #[Assert\NotBlank(message:"you must enter a family name")]
    private string $nom;

    #[ORM\Column(name: "prenom", type: "string", length: 50, nullable: false)]
    #[Assert\NotBlank(message:"you must enter a name")]
    private string $prenom;

    #[ORM\Column(name: "age", type: "integer", nullable: false)]
    #[Assert\NotBlank(message:"you must enter your age")]
    private int $age;

    #[ORM\Column(name: "email", type: "string", length: 50, nullable: false)]
    #[Assert\NotBlank(message:"you must enter an email")]
    #[Assert\Email(message: "the email '{{ value }}' is not a valid email")]
    private string $email;

    #[ORM\Column(name: "telephone", type: "string", length: 20, nullable: false)]
    #[Assert\NotBlank(message:"you must enter a phone number")]
    private string $telephone;

    #[ORM\Column(name: "password", type: "string", length: 100, nullable: false)]
    #[Assert\NotBlank(message:"you must enter a password")]
    #[Assert\Length(min: 8,minMessage: "min 8 caractères")]
    private string $password;

    #[ORM\Column(name: "role", type: "string", length: 20, nullable: true, options: ["default" => "User"])]
    private ?string $role = 'User';

    #[ORM\Column(name: "signature", type: "string", length: 30, nullable: true)]
    private ?string $signature;

    public function __construct()
    {
        $this->password = ''; // Initialize with an empty string
    }
    public function getIdUser(): ?int
    {
        return $this->idUser;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getSignature(): ?string
    {
        return $this->signature;
    }

    public function setSignature(?string $signature): static
    {
        $this->signature = $signature;

        return $this;
    }


    public function getRoles() : array
    {
        return [$this->role];
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }
}

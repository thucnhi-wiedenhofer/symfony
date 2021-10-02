<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 *  @UniqueEntity(
 * fields={"username"},
 * message="Le user existe déjà"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5,max=10,minMessage="plus de 5 caracts.",maxMessage="moins de 10 caracts.")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5,max=10,minMessage="plus de 5 caracts.",maxMessage="moins de 10 caracts.")
     */
    private $password;

     /**
     * @Assert\Length(min=5,max=10,minMessage="plus de 5 caracts.",maxMessage="moins de 10 caracts.")
     * @Assert\EqualTo(propertyPath="password",message="les MdP ne sont pas équivalents.")    
     */
    private $passwordVerify;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPasswordVerify(): ?string
    {
        return $this->passwordVerify;
    }

    public function setPasswordVerify(string $passwordVerify): self
    {
        $this->passwordVerify = $passwordVerify;

        return $this;
    }

    public function eraseCredentials()
    {
        
    }

    public function getRoles()
    {
      return ['ROLE_USER'];
    }

    public function getSalt()
    {
        
    }
}

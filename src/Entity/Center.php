<?php

namespace App\Entity;

use App\Repository\CenterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CenterRepository::class)
 */
class Center
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    
  
    private $Admin;

    /**
     * @ORM\ManyToOne(targetEntity=Publicite::class, inversedBy="Center")
     */
    private $publicite;

    /**
     * @ORM\Column(type="float")
     */
    private $lon;

    /**
     * @ORM\Column(type="float")
     */
    private $lat;

   

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumTel(): ?int
    {
        return $this->num_tel;
    }

    public function setNumTel(int $num_tel): self
    {
        $this->num_tel = $num_tel;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMotPass(): ?string
    {
        return $this->mot_pass;
    }

    public function setMotPass(string $mot_pass): self
    {
        $this->mot_pass = $mot_pass;

        return $this;
    }

    public function getAdmin(): ?Admin
    {
        return $this->Admin;
    }

    public function setAdmin(?Admin $Admin): self
    {
        $this->Admin = $Admin;

        return $this;
    }

    public function getPublicite(): ?Publicite
    {
        return $this->publicite;
    }

    public function setPublicite(?Publicite $publicite): self
    {
        $this->publicite = $publicite;

        return $this;
    }

    public function getLon(): ?float
    {
        return $this->lon;
    }

    public function setLon(float $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

}

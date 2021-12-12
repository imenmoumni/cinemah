<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RegionRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=RegionRepository::class)
 */
class Region
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
     * @ORM\ManyToOne(targetEntity=Admin::class)
     */
    private $admin;

    /**
     * @ORM\OneToMany(targetEntity=Avs::class, mappedBy="region")
     */
    private $avs;

    /**
     * @ORM\OneToMany(targetEntity=Avs::class, mappedBy="region")
     */
    private $Avs;

    public function __construct()
    {
        $this->avs = new ArrayCollection();
        $this->Avs = new ArrayCollection();
    }

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

    public function getAdmin(): ?Admin
    {
        return $this->admin;
    }

    public function setAdmin(?Admin $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * @return Collection|Avs[]
     */
    public function getAvs(): Collection
    {
        return $this->avs;
    }

    public function addAvs(Avs $avs): self
    {
        if (!$this->avs->contains($avs)) {
            $this->avs[] = $avs;
            $avs->setRegion($this);
        }

        return $this;
    }

    public function removeAvs(Avs $avs): self
    {
        if ($this->avs->removeElement($avs)) {
            // set the owning side to null (unless already changed)
            if ($avs->getRegion() === $this) {
                $avs->setRegion(null);
            }
        }

        return $this;
    }

public function __toString() {
    return $this->nom;
}
}


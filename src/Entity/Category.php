<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
     * @ORM\OneToMany(targetEntity=Medecin::class, mappedBy="category")
     */
    private $medcin;

    public function __construct()
    {
        $this->medcin = new ArrayCollection();
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
     * @return Collection|Medecin[]
     */
    public function getMedcin(): Collection
    {
        return $this->medcin;
    }

    public function addMedcin(Medecin $medcin): self
    {
        if (!$this->medcin->contains($medcin)) {
            $this->medcin[] = $medcin;
            $medcin->setCategory($this);
        }

        return $this;
    }

    public function removeMedcin(Medecin $medcin): self
    {
        if ($this->medcin->removeElement($medcin)) {
            // set the owning side to null (unless already changed)
            if ($medcin->getCategory() === $this) {
                $medcin->setCategory(null);
            }
        }

        return $this;
    }

public function __toString() {
    return $this->nom;
}
}
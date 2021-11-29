<?php

namespace App\Entity;

use App\Repository\RendezVousRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RendezVousRepository::class)
 */
class RendezVous
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="rendezVous")
     */
    private $User;

    /**
     * @ORM\OneToOne(targetEntity=Medecin::class, cascade={"persist", "remove"})
     */
    private $Medecin;

    /**
     * @ORM\OneToOne(targetEntity=Avs::class, cascade={"persist", "remove"})
     */
    private $Avs;

    /**
     * @ORM\OneToOne(targetEntity=Center::class, cascade={"persist", "remove"})
     */
    private $Center;

    public function __construct()
    {
        $this->User = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->User;
    }

    public function addUser(User $user): self
    {
        if (!$this->User->contains($user)) {
            $this->User[] = $user;
            $user->setRendezVous($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->User->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getRendezVous() === $this) {
                $user->setRendezVous(null);
            }
        }

        return $this;
    }

    public function getMedecin(): ?Medecin
    {
        return $this->Medecin;
    }

    public function setMedecin(?Medecin $Medecin): self
    {
        $this->Medecin = $Medecin;

        return $this;
    }

    public function getAvs(): ?Avs
    {
        return $this->Avs;
    }

    public function setAvs(?Avs $Avs): self
    {
        $this->Avs = $Avs;

        return $this;
    }

    public function getCenter(): ?Center
    {
        return $this->Center;
    }

    public function setCenter(?Center $Center): self
    {
        $this->Center = $Center;

        return $this;
    }
}

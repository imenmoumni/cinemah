<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 */
class Admin
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mot_pass;

    /**
     * @ORM\OneToMany(targetEntity=Medecin::class, mappedBy="Admin")
     */
    private $medecins;

    /**
     * @ORM\OneToMany(targetEntity=Avs::class, mappedBy="Admin")
     */
    private $avs;

    /**
     * @ORM\OneToMany(targetEntity=Center::class, mappedBy="Admin")
     */
    private $centers;

    

    /**
     * @ORM\OneToMany(targetEntity=Publicite::class, mappedBy="Admin")
     */
    private $publicites;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="Admin")
     */
    private $commentaires;

    

    public function __construct()
    {
        $this->medecins = new ArrayCollection();
        $this->avs = new ArrayCollection();
        $this->centers = new ArrayCollection();
        $this->publicites = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Medecin[]
     */
    public function getMedecins(): Collection
    {
        return $this->medecins;
    }

    public function addMedecin(Medecin $medecin): self
    {
        if (!$this->medecins->contains($medecin)) {
            $this->medecins[] = $medecin;
            $medecin->setAdmin($this);
        }

        return $this;
    }

    public function removeMedecin(Medecin $medecin): self
    {
        if ($this->medecins->removeElement($medecin)) {
            // set the owning side to null (unless already changed)
            if ($medecin->getAdmin() === $this) {
                $medecin->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Avs[]
     */
    public function getAvs(): Collection
    {
        return $this->avs;
    }

    public function addAv(Avs $av): self
    {
        if (!$this->avs->contains($av)) {
            $this->avs[] = $av;
            $av->setAdmin($this);
        }

        return $this;
    }

    public function removeAv(Avs $av): self
    {
        if ($this->avs->removeElement($av)) {
            // set the owning side to null (unless already changed)
            if ($av->getAdmin() === $this) {
                $av->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Center[]
     */
    public function getCenters(): Collection
    {
        return $this->centers;
    }

    public function addCenter(Center $center): self
    {
        if (!$this->centers->contains($center)) {
            $this->centers[] = $center;
            $center->setAdmin($this);
        }

        return $this;
    }

    public function removeCenter(Center $center): self
    {
        if ($this->centers->removeElement($center)) {
            // set the owning side to null (unless already changed)
            if ($center->getAdmin() === $this) {
                $center->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Publicite[]
     */
    public function getPublicites(): Collection
    {
        return $this->publicites;
    }

    public function addPublicite(Publicite $publicite): self
    {
        if (!$this->publicites->contains($publicite)) {
            $this->publicites[] = $publicite;
            $publicite->setAdmin($this);
        }

        return $this;
    }

    public function removePublicite(Publicite $publicite): self
    {
        if ($this->publicites->removeElement($publicite)) {
            // set the owning side to null (unless already changed)
            if ($publicite->getAdmin() === $this) {
                $publicite->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setAdmin($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getAdmin() === $this) {
                $commentaire->setAdmin(null);
            }
        }

        return $this;
    }

}
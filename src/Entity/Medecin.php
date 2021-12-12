<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RegionRepository;
use App\Repository\MedecinRepository;
use phpDocumentor\Reflection\Types\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=MedecinRepository::class)
 */
class Medecin
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
     * @ORM\Column(type="integer")
     */
    private $num_tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class, inversedBy="medecins")
     */
    private $Admin;

   
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="Medecin")
     */
    private $commentaires;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="medcin")
     */
    private $category;

  
   


    

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection|Commentaire[]
     */
    public function getCommentaires(): \Doctrine\Common\Collections\Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setMedecin($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getMedecin() === $this) {
                $commentaire->setMedecin(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

  

  


   

   
  
 

   

    

   



  
}

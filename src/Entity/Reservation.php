<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Film::class, inversedBy="reservations")
     */
    private $Film;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     */
    private $User;

    /**
     * @ORM\OneToOne(targetEntity=Cinema::class, cascade={"persist", "remove"})
     */
    private $Cinema;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_ticket;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilm(): ?Film
    {
        return $this->Film;
    }

    public function setFilm(?Film $Film): self
    {
        $this->Film = $Film;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getCinema(): ?Cinema
    {
        return $this->Cinema;
    }

    public function setCinema(?Cinema $Cinema): self
    {
        $this->Cinema = $Cinema;

        return $this;
    }

    public function getNombreTicket(): ?int
    {
        return $this->nombre_ticket;
    }

    public function setNombreTicket(int $nombre_ticket): self
    {
        $this->nombre_ticket = $nombre_ticket;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketRepository::class)]
class Ticket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tick_auteur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $tick_date_ouv = null; //Pour les dates, tjrs preferer DateTimeInterface plutôt que Date !

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable:true)]
    private ?\DateTimeInterface $tick_date_clo = null;

    #[ORM\Column(length: 255)]
    private ?string $tick_description = null;

    #[ORM\Column(length: 255)]
    private ?string $tick_categorie = null;

    #[ORM\Column(length: 255)]
    private ?string $tick_status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tick_responsable = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTickAuteur(): ?string
    {
        return $this->tick_auteur;
    }

    public function setTickAuteur(string $tick_auteur): static
    {
        $this->tick_auteur = $tick_auteur;

        return $this;
    }

    public function getTickDateOuv(): ?\DateTimeInterface
    {
        return $this->tick_date_ouv;
    }

    public function setTickDateOuv(\DateTimeInterface $tick_date_ouv): static
    {
        $this->tick_date_ouv = $tick_date_ouv;

        return $this;
    }

    public function getTickDateClo(): ?\DateTimeInterface
    {
        return $this->tick_date_clo;
    }

    public function setTickDateClo(?\DateTimeInterface $tick_date_clo): static
    {
        $this->tick_date_clo = $tick_date_clo;

        return $this;
    }

    public function getTickDescription(): ?string
    {
        return $this->tick_description;
    }

    public function setTickDescription(string $tick_description): static
    {
        $this->tick_description = $tick_description;

        return $this;
    }

    public function getTickCategorie(): ?string
    {
        return $this->tick_categorie;
    }

    public function setTickCategorie(string $tick_categorie): static
    {
        $this->tick_categorie = $tick_categorie;

        return $this;
    }

    public function getTickStatus(): ?string
    {
        return $this->tick_status;
    }

    public function setTickStatus(string $tick_status): static
    {
        $this->tick_status = $tick_status;

        return $this;
    }

    public function getTickResponsable(): ?string
    {
        return $this->tick_responsable;
    }

    public function setTickResponsable(?string $tick_responsable): static
    {
        $this->tick_responsable = $tick_responsable;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\SortRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SortRepository::class)]
#[ORM\Table(name: '`sort`')]
class Sort
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $effet = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $propriete = null;

    #[ORM\Column(length: 255)]
    private ?string $ecole = null;

    #[ORM\Column(length: 255)]
    private ?string $dc = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $magnitude = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $inkarnai = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEffet(): ?string
    {
        return $this->effet;
    }

    public function setEffet(string $effet): static
    {
        $this->effet = $effet;

        return $this;
    }

    public function getPropriete(): ?string
    {
        return $this->propriete;
    }

    public function setPropriete(?string $propriete): static
    {
        $this->propriete = $propriete;

        return $this;
    }

    public function getEcole(): ?string
    {
        return $this->ecole;
    }

    public function setEcole(string $ecole): static
    {
        $this->ecole = $ecole;

        return $this;
    }

    public function getDc(): ?string
    {
        return $this->dc;
    }

    public function setDc(string $dc): static
    {
        $this->dc = $dc;

        return $this;
    }

    public function getMagnitude(): ?string
    {
        return $this->magnitude;
    }

    public function setMagnitude(string $magnitude): static
    {
        $this->magnitude = $magnitude;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getInkarnai(): ?string
    {
        return $this->inkarnai;
    }

    public function setInkarnai(?string $inkarnai): static
    {
        $this->inkarnai = $inkarnai;

        return $this;
    }
}

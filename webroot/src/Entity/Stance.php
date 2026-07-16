<?php

namespace App\Entity;

use App\Repository\StanceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StanceRepository::class)]
class Stance
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private $id;

	#[ORM\Column(length: 255)]
    private ?string $stance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $effect = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStance(): ?string
    {
        return $this->stance;
    }

    public function setStance(string $stance): static
    {
        $this->stance = $stance;

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

    public function getEffect(): ?string
    {
        return $this->effect;
    }

    public function setEffect(string $effect): static
    {
        $this->effect = $effect;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\GlossaryTraitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GlossaryTraitRepository::class)]
class GlossaryTrait
{
    #[ORM\Id]
    #[ORM\Column(length: 255)]
    private ?string $trait = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $effect = null;

    public function getId(): ?int
    {
        return $this->trait;
    }

    public function getTrait(): ?string
    {
        return $this->trait;
    }

    public function setTrait(string $trait): static
    {
        $this->trait = $trait;

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

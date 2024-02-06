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
    private ?string $Trait = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Effect = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrait(): ?string
    {
        return $this->Trait;
    }

    public function setTrait(string $Trait): static
    {
        $this->Trait = $Trait;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getEffect(): ?string
    {
        return $this->Effect;
    }

    public function setEffect(string $Effect): static
    {
        $this->Effect = $Effect;

        return $this;
    }
}

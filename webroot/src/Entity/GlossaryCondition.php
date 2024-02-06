<?php

namespace App\Entity;

use App\Repository\GlossaryConditionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GlossaryConditionRepository::class)]
class GlossaryCondition
{
    #[ORM\Id]
    #[ORM\Column(length: 255)]
    private ?string $Condition = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Effect = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCondition(): ?string
    {
        return $this->Condition;
    }

    public function setCondition(string $Condition): static
    {
        $this->Condition = $Condition;

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

<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
class Skill
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private $id;

	#[ORM\Column(length: 255, unique: true)]
    private ?string $skill = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainCarac = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $specialisationExample = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $testExample = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkill(): ?string
    {
        return $this->skill;
    }

    public function setSkill(string $skill): static
    {
        $this->skill = $skill;

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

    public function getMainCarac(): ?string
    {
        return $this->mainCarac;
    }

    public function setMainCarac(?string $mainCarac): static
    {
        $this->mainCarac = $mainCarac;

        return $this;
    }

    public function getSpecialisationExample(): ?string
    {
        return $this->specialisationExample;
    }

    public function setSpecialisationExample(?string $specialisationExample): static
    {
        $this->specialisationExample = $specialisationExample;

        return $this;
    }

    public function getTestExample(): ?string
    {
        return $this->testExample;
    }

    public function setTestExample(?string $testExample): static
    {
        $this->testExample = $testExample;

        return $this;
    }
}

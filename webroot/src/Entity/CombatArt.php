<?php

namespace App\Entity;

use App\Repository\CombatArtRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombatArtRepository::class)]
class CombatArt
{
    #[ORM\Id]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $conditions = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $effect = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cost = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $assaillantTest = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $defenderTest = null;

    #[ORM\ManyToMany(targetEntity: WeaponCategory::class)]
    #[ORM\JoinColumn(name: "combat_art", referencedColumnName: "name")]
    #[ORM\InverseJoinColumn(name: "weapon_category", referencedColumnName: "category")]
    private Collection $weaponCategories;

    public function __construct()
    {
        $this->weaponCategories = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getConditions(): ?string
    {
        return $this->conditions;
    }

    public function setConditions(?string $conditions): static
    {
        $this->conditions = $conditions;

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

    public function getCost(): ?string
    {
        return $this->cost;
    }

    public function setCost(?string $cost): static
    {
        $this->cost = $cost;

        return $this;
    }

    public function getAssaillantTest(): ?string
    {
        return $this->assaillantTest;
    }

    public function setAssaillantTest(string $assaillantTest): static
    {
        $this->assaillantTest = $assaillantTest;

        return $this;
    }

    public function getDefenderTest(): ?string
    {
        return $this->defenderTest;
    }

    public function setDefenderTest(string $defenderTest): static
    {
        $this->defenderTest = $defenderTest;

        return $this;
    }

    /**
     * @return Collection<int, WeaponCategory>
     */
    public function getWeaponCategories(): Collection
    {
        return $this->weaponCategories;
    }

    public function addWeaponCategory(WeaponCategory $weaponCategory): static
    {
        if (!$this->weaponCategories->contains($weaponCategory)) {
            $this->weaponCategories->add($weaponCategory);
        }

        return $this;
    }

    public function removeWeaponCategory(WeaponCategory $weaponCategory): static
    {
        $this->weaponCategories->removeElement($weaponCategory);

        return $this;
    }

}

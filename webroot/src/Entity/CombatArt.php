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
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private $id;

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

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $critique = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $assaillantTest = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $defenderTest = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $category = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tier = null;

    #[ORM\Column(type: 'integer')]
    private int $orderIndex = 0;

    #[ORM\Column(type: 'integer')]
    private int $section = 1;

    #[ORM\ManyToMany(targetEntity: WeaponCategory::class)]
    #[ORM\JoinTable(name: 'combat_art_weapon_category')]
    #[ORM\JoinColumn(name: 'combat_art_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'weapon_category_id', referencedColumnName: 'id')]
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

    public function getCritique(): ?string
    {
        return $this->critique;
    }

    public function setCritique(?string $critique): static
    {
        $this->critique = $critique;

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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getTier(): ?string
    {
        return $this->tier;
    }

    public function setTier(?string $tier): static
    {
        $this->tier = $tier;

        return $this;
    }

    public function getOrderIndex(): int
    {
        return $this->orderIndex;
    }

    public function setOrderIndex(int $orderIndex): static
    {
        $this->orderIndex = $orderIndex;

        return $this;
    }

    public function getSection(): int
    {
        return $this->section;
    }

    public function setSection(int $section): static
    {
        $this->section = $section;

        return $this;
    }

}

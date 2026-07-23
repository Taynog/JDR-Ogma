<?php

namespace App\Entity;

use App\Repository\MaterialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaterialRepository::class)]
class Material
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private $id;

	#[ORM\Column(length: 255, unique: true)]
    private ?string $material = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $weaponBonusDmg = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $weaponPassiveEffect = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $weaponActiveEffect = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $armorBonusProtection = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $armorBonusProctectionMagical = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $armorPassiveEffect = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $armorActiveEffect = null;

    #[ORM\ManyToMany(targetEntity: Armor::class, inversedBy: 'materials')]
    #[ORM\JoinTable(name: 'armor_material')]
    #[ORM\JoinColumn(name: 'armor_material', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'armor_category', referencedColumnName: 'id')]
    private Collection $armorCategory;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $weaponPriceMultiplier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $armorPriceMultiplier = null;

    public function __construct()
    {
        $this->armorCategory = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(string $material): static
    {
        $this->material = $material;

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

    public function getWeaponBonusDmg(): ?string
    {
        return $this->weaponBonusDmg;
    }

    public function setWeaponBonusDmg(?string $weaponBonusDmg): static
    {
        $this->weaponBonusDmg = $weaponBonusDmg;

        return $this;
    }

    public function getWeaponPassiveEffect(): ?string
    {
        return $this->weaponPassiveEffect;
    }

    public function setWeaponPassiveEffect(?string $weaponPassiveEffect): static
    {
        $this->weaponPassiveEffect = $weaponPassiveEffect;

        return $this;
    }

    public function getWeaponActiveEffect(): ?string
    {
        return $this->weaponActiveEffect;
    }

    public function setWeaponActiveEffect(?string $weaponActiveEffect): static
    {
        $this->weaponActiveEffect = $weaponActiveEffect;

        return $this;
    }

    public function getArmorBonusProtection(): ?string
    {
        return $this->armorBonusProtection;
    }

    public function setArmorBonusProtection(?string $armorBonusProtection): static
    {
        $this->armorBonusProtection = $armorBonusProtection;

        return $this;
    }

    public function getArmorBonusProctectionMagical(): ?string
    {
        return $this->armorBonusProctectionMagical;
    }

    public function setArmorBonusProctectionMagical(?string $armorBonusProctectionMagical): static
    {
        $this->armorBonusProctectionMagical = $armorBonusProctectionMagical;

        return $this;
    }

    public function getArmorPassiveEffect(): ?string
    {
        return $this->armorPassiveEffect;
    }

    public function setArmorPassiveEffect(?string $armorPassiveEffect): static
    {
        $this->armorPassiveEffect = $armorPassiveEffect;

        return $this;
    }

    public function getArmorActiveEffect(): ?string
    {
        return $this->armorActiveEffect;
    }

    public function setArmorActiveEffect(?string $armorActiveEffect): static
    {
        $this->armorActiveEffect = $armorActiveEffect;

        return $this;
    }

    /**
     * @return Collection<int, Armor>
     */
    public function getArmorCategory(): Collection
    {
        return $this->armorCategory;
    }

    public function addArmorCategory(Armor $armorCategory): static
    {
        if (!$this->armorCategory->contains($armorCategory)) {
            $this->armorCategory->add($armorCategory);
        }

        return $this;
    }

    public function removeArmorCategory(Armor $armorCategory): static
    {
        $this->armorCategory->removeElement($armorCategory);

        return $this;
    }

    public function getWeaponPriceMultiplier(): ?string
    {
        return $this->weaponPriceMultiplier;
    }

    public function setWeaponPriceMultiplier(?string $weaponPriceMultiplier): static
    {
        $this->weaponPriceMultiplier = $weaponPriceMultiplier;

        return $this;
    }

    public function getArmorPriceMultiplier(): ?string
    {
        return $this->armorPriceMultiplier;
    }

    public function setArmorPriceMultiplier(?string $armorPriceMultiplier): static
    {
        $this->armorPriceMultiplier = $armorPriceMultiplier;

        return $this;
    }
}

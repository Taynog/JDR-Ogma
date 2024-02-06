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
    #[ORM\Column(length: 255)]
    private ?string $Material = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $WeaponBonusDmg = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $WeaponPassiveEffect = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $WeaponActiveEffect = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ArmorBonusProtection = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ArmorBonusProctectionMagical = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $ArmorPassiveEffect = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $ArmorActiveEffect = null;

    #[ORM\ManyToMany(targetEntity: Armor::class, inversedBy: 'Materials')]
    private Collection $ArmorCategory;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $WeaponPriceMultiplier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ArmorPriceMultiplier = null;

    public function __construct()
    {
        $this->ArmorCategory = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaterial(): ?string
    {
        return $this->Material;
    }

    public function setMaterial(string $Material): static
    {
        $this->Material = $Material;

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

    public function getWeaponBonusDmg(): ?string
    {
        return $this->WeaponBonusDmg;
    }

    public function setWeaponBonusDmg(?string $WeaponBonusDmg): static
    {
        $this->WeaponBonusDmg = $WeaponBonusDmg;

        return $this;
    }

    public function getWeaponPassiveEffect(): ?string
    {
        return $this->WeaponPassiveEffect;
    }

    public function setWeaponPassiveEffect(?string $WeaponPassiveEffect): static
    {
        $this->WeaponPassiveEffect = $WeaponPassiveEffect;

        return $this;
    }

    public function getWeaponActiveEffect(): ?string
    {
        return $this->WeaponActiveEffect;
    }

    public function setWeaponActiveEffect(?string $WeaponActiveEffect): static
    {
        $this->WeaponActiveEffect = $WeaponActiveEffect;

        return $this;
    }

    public function getArmorBonusProtection(): ?string
    {
        return $this->ArmorBonusProtection;
    }

    public function setArmorBonusProtection(?string $ArmorBonusProtection): static
    {
        $this->ArmorBonusProtection = $ArmorBonusProtection;

        return $this;
    }

    public function getArmorBonusProctectionMagical(): ?string
    {
        return $this->ArmorBonusProctectionMagical;
    }

    public function setArmorBonusProctectionMagical(?string $ArmorBonusProctectionMagical): static
    {
        $this->ArmorBonusProctectionMagical = $ArmorBonusProctectionMagical;

        return $this;
    }

    public function getArmorPassiveEffect(): ?string
    {
        return $this->ArmorPassiveEffect;
    }

    public function setArmorPassiveEffect(?string $ArmorPassiveEffect): static
    {
        $this->ArmorPassiveEffect = $ArmorPassiveEffect;

        return $this;
    }

    public function getArmorActiveEffect(): ?string
    {
        return $this->ArmorActiveEffect;
    }

    public function setArmorActiveEffect(?string $ArmorActiveEffect): static
    {
        $this->ArmorActiveEffect = $ArmorActiveEffect;

        return $this;
    }

    /**
     * @return Collection<int, Armor>
     */
    public function getArmorCategory(): Collection
    {
        return $this->ArmorCategory;
    }

    public function addArmorCategory(Armor $armorCategory): static
    {
        if (!$this->ArmorCategory->contains($armorCategory)) {
            $this->ArmorCategory->add($armorCategory);
        }

        return $this;
    }

    public function removeArmorCategory(Armor $armorCategory): static
    {
        $this->ArmorCategory->removeElement($armorCategory);

        return $this;
    }

    public function getWeaponPriceMultiplier(): ?string
    {
        return $this->WeaponPriceMultiplier;
    }

    public function setWeaponPriceMultiplier(?string $WeaponPriceMultiplier): static
    {
        $this->WeaponPriceMultiplier = $WeaponPriceMultiplier;

        return $this;
    }

    public function getArmorPriceMultiplier(): ?string
    {
        return $this->ArmorPriceMultiplier;
    }

    public function setArmorPriceMultiplier(?string $ArmorPriceMultiplier): static
    {
        $this->ArmorPriceMultiplier = $ArmorPriceMultiplier;

        return $this;
    }
}

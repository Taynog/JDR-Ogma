<?php

namespace App\Entity;

use App\Repository\WeaponRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeaponRepository::class)]
class Weapon
{
    #[ORM\Id]
    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $damageType = null;

    #[ORM\Column(length: 255)]
    private ?string $damage = null;

    #[ORM\Column(length: 255)]
    private ?string $handling = null;

    #[ORM\Column(length: 25)]
    private ?string $reach = null;

    #[ORM\ManyToMany(targetEntity: WeaponProperties::class, mappedBy: 'weaponType')]
    private Collection $weaponProperties;

    #[ORM\ManyToOne(inversedBy: 'weapons')]
    #[ORM\JoinColumn(referencedColumnName: 'category', nullable: false)]
    private ?WeaponCategory $category = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $enc = null;

    #[ORM\Column(length: 255)]
    private ?string $price = null;


    public function __construct()
    {
        $this->weaponProperties = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->type;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDamageType(): ?string
    {
        return $this->damageType;
    }

    public function setDamageType(string $damageType): static
    {
        $this->damageType = $damageType;

        return $this;
    }

    public function getDamage(): ?string
    {
        return $this->damage;
    }

    public function setDamage(string $damage): static
    {
        $this->damage = $damage;

        return $this;
    }

    public function getHandling(): ?string
    {
        return $this->handling;
    }

    public function setHandling(string $handling): static
    {
        $this->handling = $handling;

        return $this;
    }

    public function getReach(): ?string
    {
        return $this->reach;
    }

    public function setReach(string $reach): static
    {
        $this->reach = $reach;

        return $this;
    }

    public function getCategory(): ?WeaponCategory
    {
        return $this->category;
    }

    public function setCategory(?WeaponCategory $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getENC(): ?int
    {
        return $this->enc;
    }

    public function setENC(int $enc): static
    {
        $this->enc = $enc;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, WeaponProperties>
     */
    public function getWeaponProperties(): Collection
    {
        return $this->weaponProperties;
    }

    public function addWeaponProperty(WeaponProperties $weaponProperty): static
    {
        if (!$this->weaponProperties->contains($weaponProperty)) {
            $this->weaponProperties->add($weaponProperty);
            $weaponProperty->addWeaponType($this);
        }

        return $this;
    }

    public function removeWeaponProperty(WeaponProperties $weaponProperty): static
    {
        if ($this->weaponProperties->removeElement($weaponProperty)) {
            $weaponProperty->removeWeaponType($this);
        }

        return $this;
    }
}

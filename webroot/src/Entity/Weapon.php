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
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

	#[ORM\Column(length: 50, unique: true)]
	private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $damageType = null;

    #[ORM\Column(length: 255)]
    private ?string $damage = null;

    #[ORM\Column(length: 255)]
    private ?string $handling = null;

    #[ORM\Column(length: 25)]
    private ?string $reach = null;

    #[ORM\ManyToMany(targetEntity: WeaponPropertyDetails::class)]
    #[ORM\JoinTable(name: 'weapon_property_weapon')]
    #[ORM\JoinColumn(name: 'weapon_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'weapon_property_details_id', referencedColumnName: 'id')]
    private Collection $weaponProperties;

    #[ORM\ManyToOne(inversedBy: 'weapons', targetEntity: WeaponCategory::class)]
    #[ORM\JoinColumn(name: 'category_id', referencedColumnName: 'id', nullable: false)]
    private ?WeaponCategory $category = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $enc = null;

    #[ORM\Column(length: 255)]
    private ?string $price = null;


    public function __construct()
    {
        $this->weaponProperties = new ArrayCollection();
    }

	public function __toString(): string {
		return (string)$this->type;
	}

	public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection<int, WeaponPropertyDetails>
     */
    public function getWeaponProperties(): Collection
    {
        return $this->weaponProperties;
    }

    public function addWeaponProperty(WeaponPropertyDetails $weaponProperty): static
    {
        if (!$this->weaponProperties->contains($weaponProperty)) {
            $this->weaponProperties->add($weaponProperty);
        }

        return $this;
    }

    public function removeWeaponProperty(WeaponPropertyDetails $weaponProperty): static
    {
        $this->weaponProperties->removeElement($weaponProperty);

        return $this;
    }
}

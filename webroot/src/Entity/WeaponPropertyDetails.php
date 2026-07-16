<?php

namespace App\Entity;

use App\Repository\WeaponPropertYDetailsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeaponPropertyDetailsRepository::class)]
class WeaponPropertyDetails
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Weapon::class, inversedBy: 'weaponProperties')]
    #[ORM\JoinColumn(referencedColumnName: "id", nullable: false)]
    private Weapon $weapon;

	#[ORM\Id]
    #[ORM\ManyToOne(targetEntity: WeaponProperty::class, inversedBy: 'weaponPropertyDetails')]
    #[ORM\JoinColumn(referencedColumnName: 'id', nullable: false)]
    private WeaponProperty $weaponProperty;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $X = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $Y = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $Z = null;

    public function __construct($weapon, $weaponProperty)
    {
        $this->weapon = $weapon;
        $this->weaponProperty = $weaponProperty;
    }

    public function getId(): ?array
    {
        return [$this->weapon, $this->weaponProperty];
    }

    /**
     * @return Weapon
     */
    public function getWeapon(): Weapon
    {
        return $this->weapon;
    }

    public function getWeaponProperty(): ?WeaponProperty
    {
        return $this->weaponProperty;
    }

    public function setWeaponProperty(?WeaponProperty $weaponProperty): static
    {
        $this->weaponProperty = $weaponProperty;

        return $this;
    }

    public function getX(): ?string
    {
        return $this->X;
    }

    public function setX(?string $X): static
    {
        $this->X = $X;

        return $this;
    }

    public function getY(): ?string
    {
        return $this->Y;
    }

    public function setY(?string $Y): static
    {
        $this->Y = $Y;

        return $this;
    }

    public function getZ(): ?string
    {
        return $this->Z;
    }

    public function setZ(?string $Z): static
    {
        $this->Z = $Z;

        return $this;
    }
}

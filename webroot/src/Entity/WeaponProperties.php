<?php

namespace App\Entity;

use App\Repository\WeaponPropertiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeaponPropertiesRepository::class)]
class WeaponProperties
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Weapon::class, inversedBy: 'weaponProperties')]
    #[ORM\JoinTable(name: "weapon_properties_join_weapons")]
    #[ORM\JoinColumn(name: "weapon_properties_id", referencedColumnName: "id")]
    #[ORM\InverseJoinColumn(name: "weapon_type", referencedColumnName: "type")]
    private Collection $weaponType;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(referencedColumnName: 'property', nullable: false)]
    private ?WeaponProperty $weaponProperty = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $X = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $Y = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $Z = null;

    public function __construct()
    {
        $this->weaponType = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Weapon>
     */
    public function getWeaponType(): Collection
    {
        return $this->weaponType;
    }

    public function addWeaponType(Weapon $weaponType): static
    {
        if (!$this->weaponType->contains($weaponType)) {
            $this->weaponType->add($weaponType);
        }

        return $this;
    }

    public function removeWeaponType(Weapon $weaponType): static
    {
        $this->weaponType->removeElement($weaponType);

        return $this;
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

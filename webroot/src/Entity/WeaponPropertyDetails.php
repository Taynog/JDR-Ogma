<?php

namespace App\Entity;

use App\Repository\WeaponPropertyDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeaponPropertyDetailsRepository::class)]
class WeaponPropertyDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: WeaponProperty::class, inversedBy: 'weaponPropertyDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private ?WeaponProperty $weaponProperty = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $X = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $Y = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $Z = null;

    public function getId(): ?int
    {
        return $this->id;
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

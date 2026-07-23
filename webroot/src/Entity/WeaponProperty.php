<?php

namespace App\Entity;

use App\Repository\WeaponPropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeaponPropertyRepository::class)]
class WeaponProperty
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private $id;

	#[ORM\Column(length: 255, unique: true)]
    private ?string $property = null;

	#[ORM\OneToMany(targetEntity: WeaponPropertyDetails::class, mappedBy: 'weaponProperty')]
	private Collection $weaponPropertyDetails;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $effect = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $example = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProperty(): ?string
    {
        return $this->property;
    }

    public function setProperty(string $property): static
    {
        $this->property = $property;

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

    public function getEffect(): ?string
    {
        return $this->effect;
    }

    public function setEffect(?string $effect): static
    {
        $this->effect = $effect;

        return $this;
    }

    public function getExample(): ?string
    {
        return $this->example;
    }

    public function setExample(?string $example): static
    {
        $this->example = $example;

        return $this;
    }

    /**
     * @return Collection<int, WeaponPropertyDetails>
     */
    public function getWeaponPropertyDetails(): Collection
    {
        return $this->weaponPropertyDetails;
    }

    public function addWeaponPropertyDetail(WeaponPropertyDetails $weaponPropertyDetail): static
    {
        if (!$this->weaponPropertyDetails->contains($weaponPropertyDetail)) {
            $this->weaponPropertyDetails->add($weaponPropertyDetail);
            $weaponPropertyDetail->setWeaponProperty($this);
        }

        return $this;
    }

    public function removeWeaponPropertyDetail(WeaponPropertyDetails $weaponPropertyDetail): static
    {
        if ($this->weaponPropertyDetails->removeElement($weaponPropertyDetail)) {
            if ($weaponPropertyDetail->getWeaponProperty() === $this) {
                $weaponPropertyDetail->setWeaponProperty(null);
            }
        }

        return $this;
    }
}

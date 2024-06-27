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
    #[ORM\Column(length: 255)]
    private ?string $property = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $effect = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $example = null;

    #[ORM\ManyToMany(targetEntity: Weapon::class, mappedBy: 'Properties')]
    private Collection $weapons;

    public function __construct()
    {
        $this->weapons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->property;
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
     * @return Collection<int, Weapon>
     */
    public function getWeapons(): Collection
    {
        return $this->weapons;
    }

    public function addWeapon(Weapon $weapon): static
    {
        if (!$this->weapons->contains($weapon)) {
            $this->weapons->add($weapon);
            $weapon->addProperty($this);
        }

        return $this;
    }

    public function removeWeapon(Weapon $weapon): static
    {
        if ($this->weapons->removeElement($weapon)) {
            $weapon->removeProperty($this);
        }

        return $this;
    }
}

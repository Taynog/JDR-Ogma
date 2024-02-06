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
    private ?string $Property = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Effect = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Example = null;

    #[ORM\ManyToMany(targetEntity: Weapon::class, mappedBy: 'Properties')]
    private Collection $weapons;

    public function __construct()
    {
        $this->weapons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProperty(): ?string
    {
        return $this->Property;
    }

    public function setProperty(string $Property): static
    {
        $this->Property = $Property;

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

    public function getEffect(): ?string
    {
        return $this->Effect;
    }

    public function setEffect(?string $Effect): static
    {
        $this->Effect = $Effect;

        return $this;
    }

    public function getExample(): ?string
    {
        return $this->Example;
    }

    public function setExample(?string $Example): static
    {
        $this->Example = $Example;

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

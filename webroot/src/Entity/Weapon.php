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
    private ?string $Type = null;

    #[ORM\Column(length: 255)]
    private ?string $DamageType = null;

    #[ORM\Column(length: 255)]
    private ?string $Damage = null;

    #[ORM\Column(length: 255)]
    private ?string $Handling = null;

    #[ORM\ManyToMany(targetEntity: WeaponProperty::class, inversedBy: 'weapons')]
    private Collection $Properties;

    #[ORM\ManyToOne(inversedBy: 'weapons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?WeaponCategory $Category = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $ENC = null;

    #[ORM\Column(length: 255)]
    private ?string $Price = null;


    public function __construct()
    {
        $this->Properties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): static
    {
        $this->Type = $Type;

        return $this;
    }

    public function getDamageType(): ?string
    {
        return $this->DamageType;
    }

    public function setDamageType(string $DamageType): static
    {
        $this->DamageType = $DamageType;

        return $this;
    }

    public function getDamage(): ?string
    {
        return $this->Damage;
    }

    public function setDamage(string $Damage): static
    {
        $this->Damage = $Damage;

        return $this;
    }

    public function getHandling(): ?string
    {
        return $this->Handling;
    }

    public function setHandling(string $Handling): static
    {
        $this->Handling = $Handling;

        return $this;
    }

    public function getProperties(): ?Collection
    {
        return $this->Properties;
    }

    public function setProperties(Collection $Properties): static
    {
        $this->Properties = $Properties;

        return $this;
    }

    public function getCategory(): ?WeaponCategory
    {
        return $this->Category;
    }

    public function setCategory(WeaponCategory $Category): static
    {
        $this->Category = $Category;

        return $this;
    }

    public function getENC(): ?int
    {
        return $this->ENC;
    }

    public function setENC(int $ENC): static
    {
        $this->ENC = $ENC;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->Price;
    }

    public function setPrice(string $Price): static
    {
        $this->Price = $Price;

        return $this;
    }

    public function addProperty(WeaponProperty $property): static
    {
        if (!$this->Properties->contains($property)) {
            $this->Properties->add($property);
        }

        return $this;
    }

    public function removeProperty(WeaponProperty $property): static
    {
        $this->Properties->removeElement($property);

        return $this;
    }
}

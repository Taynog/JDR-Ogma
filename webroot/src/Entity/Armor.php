<?php

namespace App\Entity;

use App\Repository\ArmorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArmorRepository::class)]
class Armor
{
    #[ORM\Id]
    #[ORM\Column(length: 255)]
    private ?string $Category = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $Protection = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $ProtectionMagical = null;

    #[ORM\Column(length: 255)]
    private ?string $Price = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $ENC = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $SpeedPenalty = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $MovementCheckDisadvantage = null;

    #[ORM\ManyToMany(targetEntity: Material::class, mappedBy: 'ArmorCategory')]
    private Collection $Materials;

    public function __construct()
    {
        $this->Materials = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->Category;
    }

    public function setCategory(string $Category): static
    {
        $this->Category = $Category;

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

    public function getProtection(): ?int
    {
        return $this->Protection;
    }

    public function setProtection(int $Protection): static
    {
        $this->Protection = $Protection;

        return $this;
    }

    public function getProtectionMagical(): ?int
    {
        return $this->ProtectionMagical;
    }

    public function setProtectionMagical(int $ProtectionMagical): static
    {
        $this->ProtectionMagical = $ProtectionMagical;

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

    public function getENC(): ?int
    {
        return $this->ENC;
    }

    public function setENC(int $ENC): static
    {
        $this->ENC = $ENC;

        return $this;
    }

    public function getSpeedPenalty(): ?string
    {
        return $this->SpeedPenalty;
    }

    public function setSpeedPenalty(?string $SpeedPenalty): static
    {
        $this->SpeedPenalty = $SpeedPenalty;

        return $this;
    }

    public function getMovementCheckDisadvantage(): ?string
    {
        return $this->MovementCheckDisadvantage;
    }

    public function setMovementCheckDisadvantage(?string $MovementCheckDisadvantage): static
    {
        $this->MovementCheckDisadvantage = $MovementCheckDisadvantage;

        return $this;
    }

    /**
     * @return Collection<int, Material>
     */
    public function getMaterials(): Collection
    {
        return $this->Materials;
    }

    public function addMaterial(Material $material): static
    {
        if (!$this->Materials->contains($material)) {
            $this->Materials->add($material);
            $material->addArmorCategory($this);
        }

        return $this;
    }

    public function removeMaterial(Material $material): static
    {
        if ($this->Materials->removeElement($material)) {
            $material->removeArmorCategory($this);
        }

        return $this;
    }
}

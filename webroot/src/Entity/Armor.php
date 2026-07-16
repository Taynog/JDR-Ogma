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
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private $id;

	#[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $protection = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $protectionMagical = null;

    #[ORM\Column(length: 255)]
    private ?string $price = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $enc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $speedPenalty = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $movementCheckDisadvantage = null;

    #[ORM\ManyToMany(targetEntity: Material::class, mappedBy: 'armorCategory')]
    private Collection $materials;

    public function __construct()
    {
        $this->materials = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

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

    public function getProtection(): ?int
    {
        return $this->protection;
    }

    public function setProtection(int $protection): static
    {
        $this->protection = $protection;

        return $this;
    }

    public function getProtectionMagical(): ?int
    {
        return $this->protectionMagical;
    }

    public function setProtectionMagical(int $protectionMagical): static
    {
        $this->protectionMagical = $protectionMagical;

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

    public function getENC(): ?int
    {
        return $this->enc;
    }

    public function setENC(int $enc): static
    {
        $this->enc = $enc;

        return $this;
    }

    public function getSpeedPenalty(): ?string
    {
        return $this->speedPenalty;
    }

    public function setSpeedPenalty(?string $speedPenalty): static
    {
        $this->speedPenalty = $speedPenalty;

        return $this;
    }

    public function getMovementCheckDisadvantage(): ?string
    {
        return $this->movementCheckDisadvantage;
    }

    public function setMovementCheckDisadvantage(?string $movementCheckDisadvantage): static
    {
        $this->movementCheckDisadvantage = $movementCheckDisadvantage;

        return $this;
    }

    /**
     * @return Collection<int, Material>
     */
    public function getMaterials(): Collection
    {
        return $this->materials;
    }

    public function addMaterial(Material $material): static
    {
        if (!$this->materials->contains($material)) {
            $this->materials->add($material);
            $material->addArmorCategory($this);
        }

        return $this;
    }

    public function removeMaterial(Material $material): static
    {
        if ($this->materials->removeElement($material)) {
            $material->removeArmorCategory($this);
        }

        return $this;
    }
}

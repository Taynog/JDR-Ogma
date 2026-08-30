<?php

namespace App\Entity;

use App\Repository\WebContentSectionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WebContentSectionRepository::class)]
class WebContentSection
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private $id;

	#[ORM\ManyToOne(targetEntity: WebContent::class, inversedBy: 'sections')]
	#[ORM\JoinColumn(nullable: false)]
	private ?WebContent $webContent = null;

	#[ORM\Column(type: 'integer')]
	private int $position = 0;

	#[ORM\Column(length: 255, nullable: true)]
	private ?string $title = null;

	#[ORM\Column(type: 'integer')]
	private int $level = 2;

	#[ORM\Column(length: 255, nullable: true)]
	private ?string $anchor = null;

	#[ORM\Column]
	private bool $collapsible = true;

	#[ORM\Column(type: Types::TEXT, nullable: true)]
	private ?string $content = null;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getWebContent(): ?WebContent
	{
		return $this->webContent;
	}

	public function setWebContent(?WebContent $webContent): static
	{
		$this->webContent = $webContent;

		return $this;
	}

	public function getPosition(): int
	{
		return $this->position;
	}

	public function setPosition(int $position): static
	{
		$this->position = $position;

		return $this;
	}

	public function getTitle(): ?string
	{
		return $this->title;
	}

	public function setTitle(?string $title): static
	{
		$this->title = $title;

		return $this;
	}

	public function getLevel(): int
	{
		return $this->level;
	}

	public function setLevel(int $level): static
	{
		$this->level = $level;

		return $this;
	}

	public function getAnchor(): ?string
	{
		return $this->anchor;
	}

	public function setAnchor(?string $anchor): static
	{
		$this->anchor = $anchor;

		return $this;
	}

	public function isCollapsible(): bool
	{
		return $this->collapsible;
	}

	public function setCollapsible(bool $collapsible): static
	{
		$this->collapsible = $collapsible;

		return $this;
	}

	public function __toString(): string
	{
		return sprintf('[#%d] %s (h%d, pos %d)', $this->id ?? '?', $this->title ?? '(sans titre)', $this->level, $this->position);
	}

	public function getContent(): ?string
	{
		return $this->content;
	}

	public function setContent(?string $content): static
	{
		$this->content = $content;

		return $this;
	}
}

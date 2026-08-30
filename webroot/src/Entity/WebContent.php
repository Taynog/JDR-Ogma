<?php

namespace App\Entity;

use App\Repository\WebContentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WebContentRepository::class)]
class WebContent
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private $id;

	#[ORM\Column(length: 255, unique: true)]
    private ?string $page = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, enumType: WebContentCategory::class)]
    private WebContentCategory $category = WebContentCategory::UNCLASSIFIED;

    #[ORM\OneToMany(targetEntity: WebContentSection::class, mappedBy: 'webContent', cascade: ['persist', 'remove'], orphanRemoval: true)]
    #[ORM\OrderBy(['position' => 'ASC'])]
    private Collection $sections;

    public function __construct()
    {
        $this->sections = new ArrayCollection();
    }

    public function __toString(): string
    {
        return (string)$this->getTitle();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPage(): ?string
    {
        return $this->page;
    }

    public function setPage(string $page): static
    {
        $this->page = $page;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getCategory(): WebContentCategory
    {
        return $this->category;
    }

    public function setCategory(WebContentCategory $category): void
    {
        $this->category = $category;
    }

    /**
     * @return Collection<int, WebContentSection>
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(WebContentSection $section): static
    {
        if (!$this->sections->contains($section)) {
            $this->sections->add($section);
            $section->setWebContent($this);
        }

        return $this;
    }

	public function getSectionsCount(): int
	{
		return $this->sections->count();
	}

	public function removeSection(WebContentSection $section): static
    {
        if ($this->sections->removeElement($section)) {
            if ($section->getWebContent() === $this) {
                $section->setWebContent(null);
            }
        }

        return $this;
    }
}

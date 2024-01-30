<?php

namespace App\Entity;

use App\Repository\WebContentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WebContentRepository::class)]
class WebContent
{
    #[ORM\Id]
    #[ORM\Column(length: 255)]
    private ?string $page = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(length: 255, enumType: WebContentCategory::class)]
    private WebContentCategory $category = WebContentCategory::UNCLASSIFIED;


    public function getId(): ?int
    {
        return $this->page;
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

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



}

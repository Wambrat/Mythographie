<?php

namespace App\Entity;

use App\Repository\StripBoxeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StripBoxeRepository::class)
 */
class StripBoxe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\ManyToOne(targetEntity=History::class, inversedBy="stripBoxes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $history;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getHistory(): ?History
    {
        return $this->history;
    }

    public function setHistory(?History $history): self
    {
        $this->history = $history;

        return $this;
    }
}

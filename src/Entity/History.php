<?php

namespace App\Entity;

use App\Repository\HistoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HistoryRepository::class)
 */
class History
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class, inversedBy="histories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mainCharacter;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=StripBoxe::class, mappedBy="history")
     */
    private $stripBoxes;

    public function __construct()
    {
        $this->stripBoxes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMainCharacter(): ?Character
    {
        return $this->mainCharacter;
    }

    public function setMainCharacter(?Character $mainCharacter): self
    {
        $this->mainCharacter = $mainCharacter;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|StripBoxe[]
     */
    public function getStripBoxes(): Collection
    {
        return $this->stripBoxes;
    }

    public function addStripBox(StripBoxe $stripBox): self
    {
        if (!$this->stripBoxes->contains($stripBox)) {
            $this->stripBoxes[] = $stripBox;
            $stripBox->setHistory($this);
        }

        return $this;
    }

    public function removeStripBox(StripBoxe $stripBox): self
    {
        if ($this->stripBoxes->removeElement($stripBox)) {
            // set the owning side to null (unless already changed)
            if ($stripBox->getHistory() === $this) {
                $stripBox->setHistory(null);
            }
        }

        return $this;
    }
}

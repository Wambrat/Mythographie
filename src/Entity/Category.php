<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity=Character::class, mappedBy="category")
     */
    private $characters;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=Mythologie::class, mappedBy="categories")
     */
    private $mythologies;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->mythologies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|Character[]
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters[] = $character;
            $character->setCategory($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getCategory() === $this) {
                $character->setCategory(null);
            }
        }

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
     * @return Collection|Mythologie[]
     */
    public function getMythologies(): Collection
    {
        return $this->mythologies;
    }

    public function addMythology(Mythologie $mythology): self
    {
        if (!$this->mythologies->contains($mythology)) {
            $this->mythologies[] = $mythology;
            $mythology->addCategory($this);
        }

        return $this;
    }

    public function removeMythology(Mythologie $mythology): self
    {
        if ($this->mythologies->removeElement($mythology)) {
            $mythology->removeCategory($this);
        }

        return $this;
    }

}

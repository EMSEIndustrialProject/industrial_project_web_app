<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExpensesRepository")
 */
class Expenses
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $inside;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted;

    /**
     * @ORM\Column(type="date")
     */
    private $creation;

    /**
     * @ORM\Column(type="date")
     */
    private $updated;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Colocation", inversedBy="expenses")
     */
    private $colocations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\WeightedUser", mappedBy="expenses", orphanRemoval=true)
     */
    private $weighted_users;

    public function __construct()
    {
        $this->colocations = new ArrayCollection();
        $this->weighted_users = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getInside(): ?bool
    {
        return $this->inside;
    }

    public function setInside(bool $inside): self
    {
        $this->inside = $inside;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getCreation(): ?\DateTimeInterface
    {
        return $this->creation;
    }

    public function setCreation(\DateTimeInterface $creation): self
    {
        $this->creation = $creation;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return Collection|Colocation[]
     */
    public function getColocations(): Collection
    {
        return $this->colocations;
    }

    public function addColocation(Colocation $colocation): self
    {
        if (!$this->colocations->contains($colocation)) {
            $this->colocations[] = $colocation;
        }

        return $this;
    }

    public function removeColocation(Colocation $colocation): self
    {
        if ($this->colocations->contains($colocation)) {
            $this->colocations->removeElement($colocation);
        }

        return $this;
    }

    /**
     * @return Collection|WeightedUser[]
     */
    public function getWeightedUsers(): Collection
    {
        return $this->weighted_users;
    }

    public function addWeightedUser(WeightedUser $weightedUser): self
    {
        if (!$this->weighted_users->contains($weightedUser)) {
            $this->weighted_users[] = $weightedUser;
            $weightedUser->setExpenses($this);
        }

        return $this;
    }

    public function removeWeightedUser(WeightedUser $weightedUser): self
    {
        if ($this->weighted_users->contains($weightedUser)) {
            $this->weighted_users->removeElement($weightedUser);
            // set the owning side to null (unless already changed)
            if ($weightedUser->getExpenses() === $this) {
                $weightedUser->setExpenses(null);
            }
        }

        return $this;
    }
}

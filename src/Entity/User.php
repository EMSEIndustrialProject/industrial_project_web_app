<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $number;

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
     * @ORM\OneToMany(targetEntity="App\Entity\WeightedUser", mappedBy="user", orphanRemoval=true)
     */
    private $weightedUsers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Colocation", inversedBy="users")
     */
    private $colocation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ShoppingItem", mappedBy="user", orphanRemoval=true)
     */
    private $shoppingItems;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="user", orphanRemoval=true)
     */
    private $messages;

    public function __construct()
    {
        $this->weightedUsers = new ArrayCollection();
        $this->shoppingItems = new ArrayCollection();
        $this->messages = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

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
     * @return Collection|WeightedUser[]
     */
    public function getWeightedUsers(): Collection
    {
        return $this->weightedUsers;
    }

    public function addWeightedUser(WeightedUser $weightedUser): self
    {
        if (!$this->weightedUsers->contains($weightedUser)) {
            $this->weightedUsers[] = $weightedUser;
            $weightedUser->setUser($this);
        }

        return $this;
    }

    public function removeWeightedUser(WeightedUser $weightedUser): self
    {
        if ($this->weightedUsers->contains($weightedUser)) {
            $this->weightedUsers->removeElement($weightedUser);
            // set the owning side to null (unless already changed)
            if ($weightedUser->getUser() === $this) {
                $weightedUser->setUser(null);
            }
        }

        return $this;
    }

    public function getColocation(): ?Colocation
    {
        return $this->colocation;
    }

    public function setColocation(?Colocation $colocation): self
    {
        $this->colocation = $colocation;

        return $this;
    }

    /**
     * @return Collection|ShoppingItem[]
     */
    public function getShoppingItems(): Collection
    {
        return $this->shoppingItems;
    }

    public function addShoppingItem(ShoppingItem $shoppingItem): self
    {
        if (!$this->shoppingItems->contains($shoppingItem)) {
            $this->shoppingItems[] = $shoppingItem;
            $shoppingItem->setUser($this);
        }

        return $this;
    }

    public function removeShoppingItem(ShoppingItem $shoppingItem): self
    {
        if ($this->shoppingItems->contains($shoppingItem)) {
            $this->shoppingItems->removeElement($shoppingItem);
            // set the owning side to null (unless already changed)
            if ($shoppingItem->getUser() === $this) {
                $shoppingItem->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setUser($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->contains($message)) {
            $this->messages->removeElement($message);
            // set the owning side to null (unless already changed)
            if ($message->getUser() === $this) {
                $message->setUser(null);
            }
        }

        return $this;
    }
}

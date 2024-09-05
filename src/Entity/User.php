<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $community = null;

    #[ORM\Column(nullable: true)]
    private ?int $rewards = null;

    /**
     * @var Collection<int, ObjectTool>
     */
    #[ORM\OneToMany(targetEntity: ObjectTool::class, mappedBy: 'UserID', orphanRemoval: true)]
    private Collection $objectTools;

    /**
     * @var Collection<int, ObjectReview>
     */
    #[ORM\OneToMany(targetEntity: ObjectReview::class, mappedBy: 'UserID')]
    private Collection $objectReviews;

    /**
     * @var Collection<int, LenderReview>
     */
    #[ORM\OneToMany(targetEntity: LenderReview::class, mappedBy: 'UserID')]
    private Collection $lenderReviews;

    public function __construct()
    {
        $this->objectTools = new ArrayCollection();
        $this->objectReviews = new ArrayCollection();
        $this->lenderReviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getCommunity(): ?string
    {
        return $this->community;
    }

    public function setCommunity(string $community): static
    {
        $this->community = $community;

        return $this;
    }

    public function getRewards(): ?int
    {
        return $this->rewards;
    }

    public function setRewards(?int $rewards): static
    {
        $this->rewards = $rewards;

        return $this;
    }

    /**
     * @return Collection<int, ObjectTool>
     */
    public function getObjectTools(): Collection
    {
        return $this->objectTools;
    }

    public function addObjectTool(ObjectTool $objectTool): static
    {
        if (!$this->objectTools->contains($objectTool)) {
            $this->objectTools->add($objectTool);
            $objectTool->setUserID($this);
        }

        return $this;
    }

    public function removeObjectTool(ObjectTool $objectTool): static
    {
        if ($this->objectTools->removeElement($objectTool)) {
            // set the owning side to null (unless already changed)
            if ($objectTool->getUserID() === $this) {
                $objectTool->setUserID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ObjectReview>
     */
    public function getObjectReviews(): Collection
    {
        return $this->objectReviews;
    }

    public function addObjectReview(ObjectReview $objectReview): static
    {
        if (!$this->objectReviews->contains($objectReview)) {
            $this->objectReviews->add($objectReview);
            $objectReview->setUserID($this);
        }

        return $this;
    }

    public function removeObjectReview(ObjectReview $objectReview): static
    {
        if ($this->objectReviews->removeElement($objectReview)) {
            // set the owning side to null (unless already changed)
            if ($objectReview->getUserID() === $this) {
                $objectReview->setUserID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LenderReview>
     */
    public function getLenderReviews(): Collection
    {
        return $this->lenderReviews;
    }

    public function addLenderReview(LenderReview $lenderReview): static
    {
        if (!$this->lenderReviews->contains($lenderReview)) {
            $this->lenderReviews->add($lenderReview);
            $lenderReview->setUserID($this);
        }

        return $this;
    }

    public function removeLenderReview(LenderReview $lenderReview): static
    {
        if ($this->lenderReviews->removeElement($lenderReview)) {
            // set the owning side to null (unless already changed)
            if ($lenderReview->getUserID() === $this) {
                $lenderReview->setUserID(null);
            }
        }

        return $this;
    }
}

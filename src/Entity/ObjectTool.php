<?php

namespace App\Entity;

use App\Repository\ObjectToolRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObjectToolRepository::class)]
class ObjectTool
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    private ?string $object_condition = null;

    #[ORM\Column(nullable: true)]
    private ?int $prix_jour = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'objectTools')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $UserID = null;

    /**
     * @var Collection<int, ObjectReview>
     */
    #[ORM\OneToMany(targetEntity: ObjectReview::class, mappedBy: 'ObjectID', orphanRemoval: true)]
    private Collection $objectReviews;

    public function __construct()
    {
        $this->objectReviews = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getObjectCondition(): ?string
    {
        return $this->object_condition;
    }

    public function setObjectCondition(string $object_condition): static
    {
        $this->object_condition = $object_condition;

        return $this;
    }

    public function getPrixJour(): ?int
    {
        return $this->prix_jour;
    }

    public function setPrixJour(?int $prix_jour): static
    {
        $this->prix_jour = $prix_jour;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getUserID(): ?User
    {
        return $this->UserID;
    }

    public function setUserID(?User $UserID): static
    {
        $this->UserID = $UserID;

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
            $objectReview->setObjectID($this);
        }

        return $this;
    }

    public function removeObjectReview(ObjectReview $objectReview): static
    {
        if ($this->objectReviews->removeElement($objectReview)) {
            // set the owning side to null (unless already changed)
            if ($objectReview->getObjectID() === $this) {
                $objectReview->setObjectID(null);
            }
        }

        return $this;
    }
}

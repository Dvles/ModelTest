<?php

namespace App\Entity;

use App\Repository\ObjectReviewRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObjectReviewRepository::class)]
class ObjectReview
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $rating = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\ManyToOne(inversedBy: 'objectReviews')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $UserID = null;

    #[ORM\ManyToOne(inversedBy: 'objectReviews')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ObjectTool $ObjectID = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

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

    public function getObjectID(): ?ObjectTool
    {
        return $this->ObjectID;
    }

    public function setObjectID(?ObjectTool $ObjectID): static
    {
        $this->ObjectID = $ObjectID;

        return $this;
    }
}

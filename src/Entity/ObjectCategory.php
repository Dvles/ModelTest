<?php

namespace App\Entity;

use App\Repository\ObjectCategoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObjectCategoryRepository::class)]
class ObjectCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToOne(inversedBy: 'objectCategory', cascade: ['persist', 'remove'])]
    private ?ObjectTool $ObjectID = null;

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

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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

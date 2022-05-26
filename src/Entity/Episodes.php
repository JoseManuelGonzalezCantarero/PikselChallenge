<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EpisodesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpisodesRepository::class)]
#[ApiResource]
class Episodes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 100)]
    private string $name;

    #[ORM\ManyToOne(targetEntity: Studios::class, inversedBy: 'episodes')]
    #[ORM\JoinColumn(nullable: false)]
    private Studios $rightsowner;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRightsowner(): Studios
    {
        return $this->rightsowner;
    }

    public function setRightsowner(Studios $rightsowner): self
    {
        $this->rightsowner = $rightsowner;

        return $this;
    }
}

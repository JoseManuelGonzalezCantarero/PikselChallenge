<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EpisodesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpisodesRepository::class)]
class Episodes
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 50)]
    private string $id;

    #[ORM\Column(type: 'string', length: 100)]
    private string $name;

    #[ORM\ManyToOne(targetEntity: Studios::class, inversedBy: 'episodes')]
    #[ORM\JoinColumn(nullable: false)]
    private Studios $rightsowner;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
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

    public function setRightsowner(?Studios $rightsowner): self
    {
        $this->rightsowner = $rightsowner;

        return $this;
    }
}

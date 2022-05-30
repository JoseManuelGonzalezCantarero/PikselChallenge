<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RoyaltiesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoyaltiesRepository::class)]
class Royalties
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 50)]
    private string $rightsownerId;

    #[ORM\Column(type: 'string', length: 30)]
    private string $rightsowner;

    #[ORM\Column(type: 'float')]
    private float $royalty;

    #[ORM\Column(type: 'integer')]
    private int $viewings;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRightsownerId(): ?string
    {
        return $this->rightsownerId;
    }

    public function setRightsownerId(string $rightsownerId): self
    {
        $this->rightsownerId = $rightsownerId;

        return $this;
    }

    public function getRightsowner(): ?string
    {
        return $this->rightsowner;
    }

    public function setRightsowner(string $rightsowner): self
    {
        $this->rightsowner = $rightsowner;

        return $this;
    }

    public function getRoyalty(): ?float
    {
        return $this->royalty;
    }

    public function setRoyalty(float $royalty): self
    {
        $this->royalty = $royalty;

        return $this;
    }

    public function getViewings(): ?int
    {
        return $this->viewings;
    }

    public function setViewings(int $viewings): self
    {
        $this->viewings = $viewings;

        return $this;
    }
}

<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StudiosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudiosRepository::class)]
#[ApiResource]
class Studios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 30)]
    private string $name;

    #[ORM\Column(type: 'float')]
    private float $payment;

    #[ORM\OneToMany(mappedBy: 'rightsowner', targetEntity: Episodes::class, orphanRemoval: true)]
    private Collection $episodes;

    public function __construct()
    {
        $this->episodes = new ArrayCollection();
    }

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

    public function getPayment(): float
    {
        return $this->payment;
    }

    public function setPayment(float $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    /**
     * @return Collection<int, Episodes>
     */
    public function getEpisodes(): Collection
    {
        return $this->episodes;
    }

    public function addEpisode(Episodes $episode): self
    {
        if (!$this->episodes->contains($episode)) {
            $this->episodes[] = $episode;
            $episode->setRightsowner($this);
        }

        return $this;
    }

    public function removeEpisode(Episodes $episode): self
    {
        if ($this->episodes->removeElement($episode)) {
            // set the owning side to null (unless already changed)
            if ($episode->getRightsowner() === $this) {
                $episode->setRightsowner(null);
            }
        }

        return $this;
    }
}

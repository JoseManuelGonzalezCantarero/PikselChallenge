<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Episodes;
use App\Repository\EpisodesRepository;

final class FindEpisodes
{
    public function __construct(private readonly EpisodesRepository $episodesRepository)
    {
    }

    public function findEpisodeById(string $episode): ?Episodes
    {
        return $this->episodesRepository->findOneBy(['id' => $episode]);
    }
}

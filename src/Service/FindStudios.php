<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Episodes;
use App\Entity\Studios;
use App\Repository\StudiosRepository;

final class FindStudios
{
    public function __construct(private readonly StudiosRepository $studiosRepository)
    {
    }

    public function findStudioByRightsOwnerId(Episodes $episode): ?Studios
    {
        return $this->studiosRepository->findOneBy(['id' => $episode->getRightsowner()]);
    }
}

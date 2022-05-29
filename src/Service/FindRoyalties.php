<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Royalties;
use App\Repository\RoyaltiesRepository;

final class FindRoyalties
{
    public function __construct(private RoyaltiesRepository $royaltiesRepository)
    {
    }

    public function findRoyaltyByRightsOwnerId(string $rightsownerId): ?Royalties
    {
        return $this->royaltiesRepository->findOneBy(['rightsownerId' => $rightsownerId]);
    }
}

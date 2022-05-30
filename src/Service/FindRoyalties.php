<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Royalties;
use App\Repository\RoyaltiesRepository;

final class FindRoyalties
{
    public function __construct(private readonly RoyaltiesRepository $royaltiesRepository)
    {
    }

    public function findRoyaltyByRightsOwnerId(string $rightsownerId): ?Royalties
    {
        return $this->royaltiesRepository->findOneBy(['rightsownerId' => $rightsownerId]);
    }

    public function findAllRoyalties(): array
    {
        $royalties = $this->royaltiesRepository->findAll();

        $data = [];

        foreach ($royalties as $royalty) {
            $data[] = [
                'rightsownerId' => $royalty->getRightsownerId(),
                'rightsowner' => $royalty->getRightsowner(),
                'royalty' => $royalty->getRoyalty().' GBP',
                'viewings' => $royalty->getViewings()
            ];
        }

        return $data;
    }
}

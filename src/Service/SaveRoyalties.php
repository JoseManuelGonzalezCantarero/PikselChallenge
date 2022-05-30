<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Episodes;
use App\Entity\Royalties;
use App\Repository\RoyaltiesRepository;

final class SaveRoyalties
{
    public function __construct(
        private readonly FindStudios $findStudios,
        private readonly RoyaltiesRepository $royaltiesRepository,
        private readonly FindRoyalties $findRoyalties
    )
    {
    }

    public function saveRoyalties(Episodes $episode): void
    {
        $studio = $this->findStudios->findStudioByRightsOwnerId($episode);

        $royalty = $this->findRoyalties->findRoyaltyByRightsOwnerId($episode->getRightsowner()->getId());

        if (null === $royalty) {
            $royalty = new Royalties();

            $royalty->setRightsownerId($studio->getId());
            $royalty->setRightsowner($studio->getName());
            $royalty->setRoyalty($studio->getPayment());
            $royalty->setViewings(1);
        } else {
            $royalty->setRoyalty($royalty->getRoyalty() + $studio->getPayment());
            $royalty->setViewings($royalty->getViewings() + 1);
        }

        $this->royaltiesRepository->add($royalty, true);
    }
}

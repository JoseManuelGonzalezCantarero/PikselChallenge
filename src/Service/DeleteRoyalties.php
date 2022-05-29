<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\RoyaltiesRepository;

final class DeleteRoyalties
{
    public function __construct(private RoyaltiesRepository $royaltiesRepository)
    {
    }

    public function resetTable(): void
    {
        $this->royaltiesRepository->resetTable();
    }
}
